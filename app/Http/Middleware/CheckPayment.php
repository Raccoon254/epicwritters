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
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        $requiredAmount = env('REQUIRED_PAYMENT_AMOUNT', 500);

        if ($user) {
            // Sum up all the approved payments
            $totalPaidAmount = $user->payments()->where('status', 'approved')->sum('amount');

            // Check if the total amount paid by the user is greater than or equal to the required amount
            if ($totalPaidAmount >= $requiredAmount) {
                return $next($request);
            } else {
                $message = "You have paid $totalPaidAmount. The amount needed is $requiredAmount.";
                return redirect()->route('payment.create')->with('error', $message);
            }
        }

        // If the user hasn't made the required payment, redirect them or abort
        return redirect()->route('payment.create')->with('error', 'You need to pay first.');
    }

}
