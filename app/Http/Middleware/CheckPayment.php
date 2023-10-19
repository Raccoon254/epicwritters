<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $requiredAmount = env('REQUIRED_PAYMENT_AMOUNT', 500);

        if ($user) {
            $payment = $user->payments()->where('status', 'approved')->orderBy('created_at', 'desc')->first();

            //If payment exists and the amount is greater than or equal to the required amount
            if ($payment && $payment->amount >= $requiredAmount) {
                return $next($request);
            } else {
                $paidAmount = $payment ? $payment->amount : 0; //Determine the amount user paid

                $message = "You have paid $paidAmount. The amount needed is $requiredAmount.";
                return redirect()->route('payment.create')->with('error', $message);
            }
        }

        // If the user hasn't made the required payment, redirect them or abort
        return redirect()->route('payment.create')->with('error', 'You need to pay first.');
    }

}
