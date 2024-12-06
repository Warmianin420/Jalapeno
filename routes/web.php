<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PepperController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PepperController::class, 'index']);

Route::controller(PepperController::class)->group(function () {
    Route::get('/peppers/all', 'index2')->name('peppers.all_peppers');
});
Route::resource('peppers', PepperController::class);
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); // Trasa do finalizacji zamówienia
    Route::controller(OrderController::class)->group(function () {
        Route::post('/orders/store', 'store')->name('orders.store');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    });
    Route::resource('orders', OrderController::class); // Automatycznie obsługuje trasę orders.show
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});
