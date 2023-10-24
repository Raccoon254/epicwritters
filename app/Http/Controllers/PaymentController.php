<?php

namespace App\Http\Controllers;

use App\Models\Mpesa;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    //
    public function create(): View
    {
        return view('payment.create');
    }

    public function makePayment($amount): bool|RedirectResponse
    {
        if ($this->validateAmount($amount)!== true) {
            return $this->validateAmount($amount);
        }

        $phone_number = auth()->user()->phone_number;

        dd($phone_number, $amount);
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
