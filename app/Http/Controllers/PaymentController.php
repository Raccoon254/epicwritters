<?php

namespace App\Http\Controllers;

use App\Models\Mpesa;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\NewPaymentReceived;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    //
    public function create(): View
    {
        $user = auth()->user();
        $payment = $user->payments()->where('status', 'approved')->orderBy('created_at', 'desc')->first();
        $paidAmount = $payment ? $payment->amount : 0; //Determine the amount user paid
        return view('payment.create', compact('paidAmount'));
    }

    public function userPayments(): View
    {

        $user = auth()->user();
        $payments = $user->payments()->orderBy('created_at', 'desc')->get();
        return view('payment.user-payments', compact('payments'));
    }

    public function makePayment($amount): bool|RedirectResponse
    {
        if ($this->validateAmount($amount)!== true) {
            return $this->validateAmount($amount);
        }

        $phone_number = auth()->user()->phone_number;

        return redirect()->route('payment.instructions', compact('phone_number', 'amount'));
    }

    public function submit(Request $request){
        $user = auth()->user();
        $transaction_code = $request->transaction_code;

        //check if transaction is not already submitted
        $payment = $user->payments()->where('transaction_code', $transaction_code)->first();
        if ($payment) {
            return redirect()->back()->with('error', 'Transaction already submitted.');
        }

        //create payment
        $payment = $user->payments()->create([
            'transaction_code' => $transaction_code,
            'amount' => 0,
            'status' => 'pending',
        ]);

        //notify admins of new payment
        $admin = User::where('email', 'tomsteve187@gmail.com')->first();
        if ($admin) {
            $admin->notify(new NewPaymentReceived($payment));
        }

        return redirect()->route('payments.user')->with('success', 'Payment submitted successfully.');
    }

    public function show($paymentId): View
    {
        $payment = Payment::findOrFail($paymentId);
        return view('payment.show', compact('payment'));
    }

    public function index(): View
    {
        $payments = Payment::all();
        return view('payments.index', ['payments' => $payments]);
    }

    public function verify(Payment $payment): RedirectResponse
    {
        // You'd typically have logic here to verify the payment.
        $payment->update(['status' => 'verified']);

        return redirect()->route('payments.index')->with('success', 'Payment has been verified.');
    }

    public function verifyPayment($paymentId): RedirectResponse
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update(['status' => 'verified']);

        // Mark the notification as read
        $notification = $admin->notifications->where('data.payment_id', $paymentId)->first();
        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Payment verified successfully.');
    }


    private function validateAmount($amount): bool|RedirectResponse
    {
        if (!is_numeric($amount)) {
            return redirect()->back()->with('error', 'The amount must be a number.');
        }

        if ($amount <= 0) {
            return redirect()->back()->with('error', 'The amount must be greater than 0.');
        }

        $allowedAmounts = [1, 500, 1000, 2000];
        if (!in_array($amount, $allowedAmounts)) {
            return redirect()->back()->with('error', 'Invalid plan selected.');
        }

        return true;
    }

}
