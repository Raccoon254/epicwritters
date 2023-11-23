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
            'icon' => 'fas fa-money-check-alt',
            'route' => route('payments.index'),
        ],
        [
            'content' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'route' => route('admin.dashboard'),
        ],
        [
            'content' => 'Users',
            'icon' => 'fas fa-users',
            'route' => route('users.index'),
        ],
    ];

    return view('admin.dashboard', ['cards' => $cards]);
}
}
