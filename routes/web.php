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



    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', AdminMiddleware::class]], function () {
        Route::get('/admin/dashboard', function () {
            return view('layouts.admin');
        })->name('admin.dashboard');
    
        Route::resource('admin/categories', AdminCategoryController::class)->names('admin.categories');
        Route::resource('admin/food-items', FoodItemController::class)->names('admin.food_items');
        Route::resource('admin/orders', AdminOrderController::class)->only(['index', 'show', 'update'])->names('admin.orders');
    });


    Route::group(['middleware' => ['auth', CustomerMiddleware::class]], function () {
        Route::get('/customer/dashboard', function () {
            return view('layouts.customer');
        })->name('customer.dashboard');

        Route::get('/customer/categories', [CustomerCategoryController::class, 'index'])->name('customer.categories.index');
        Route::get('/customer/food-items', [CustomerFoodItemController::class, 'index'])->name('customer.food_items.index');

        Route::get('/customer/orders', [CustomerOrderController::class, 'index'])->name('customer.orders.index');
        Route::get('/customer/orders/{id}', [CustomerOrderController::class, 'show'])->name('customer.orders.show');
    });

    Route::get('/', function () {
        return view('welcome');
    })->name('home');