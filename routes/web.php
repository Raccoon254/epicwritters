<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\EventComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/payment/instructions', function () {return view('payment.instructions');})->name('payment.instructions');
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified','check-payment'])->name('dashboard');

Route::middleware(['auth', 'check-payment'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/make-payment/{amount}', [PaymentController::class, 'makePayment'])->name('make.payment');
    Route::post('/payments/submit', [PaymentController::class, 'submit'])->name('payments.submit');
    //events
    Route::get('/events', function () {return view('events');})->name('events');
});

Route::middleware(['can:manage','auth'])->group(function () {
    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/{payment}/verify', [PaymentController::class, 'verify'])->name('payments.verify');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
});

Route::get('/transactions/user', [PaymentController::class, 'userPayments'])->name('payments.user');
Route::get('/coming/soon', function () {return view('coming-soon');})->name('coming.soon');
Route::get('/about', function () {return view('about');})->name('about');
Route::get('/locked', function () {return view('locked');})->name('locked');
require __DIR__.'/auth.php';
