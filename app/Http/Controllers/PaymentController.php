<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    //
    public function create(): View
    {
        return view('payment.create');
    }
}
