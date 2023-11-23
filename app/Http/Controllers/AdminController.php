<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
public function dashboard(): View
{
    $cards = [
        [
            'content' => 'Payments',
            'icon' => 'fas fa-money-check-alt', // FontAwesome class for the icon
            'route' => route('payments.index'),
        ],
        [
            'content' => 'Verify Payment',
            'icon' => 'fas fa-check-circle', // FontAwesome class for the icon
            'route' => route('payments.verify', ['payment' => 1]), // replace 1 with actual payment id
        ],
        [
            'content' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt', // FontAwesome class for the icon
            'route' => route('admin.dashboard'),
        ],
    ];

    return view('admin.dashboard', ['cards' => $cards]);
}
}
