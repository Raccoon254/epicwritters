<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            [
                'content'=>'Events',
                'icon'=>'fa-regular fa-calendar',
                'route'=>route('admin.events'),
            ]
        ];

        return view('admin.dashboard', ['cards' => $cards]);
    }

    public function users(): View
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function events(): View
    {
        return view('admin.events');
    }
}
