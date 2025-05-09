<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Admin\FoodItemController;
use App\Http\Controllers\Customer\FoodItemController as CustomerFoodItemController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected by AdminMiddleware)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.admin');
    })->name('dashboard');

    Route::resource('categories', AdminCategoryController::class)->names('categories');
    Route::resource('food-items', FoodItemController::class)->names('food_items');
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update'])->names('orders');
});

/*
|--------------------------------------------------------------------------
| Customer Routes (Protected by CustomerMiddleware)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', CustomerMiddleware::class])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.customer');
    })->name('dashboard');

    Route::get('/categories', [CustomerCategoryController::class, 'index'])->name('categories.index');
    Route::get('/food-items', [CustomerFoodItemController::class, 'index'])->name('food_items.index');

    Route::get('/orders', [CustomerOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [CustomerOrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [CustomerOrderController::class, 'store'])->name('orders.store'); // ✅ Added this line
});
