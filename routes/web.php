<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
Route::group(['middleware' => ['auth', CustomerMiddleware::class]], function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');