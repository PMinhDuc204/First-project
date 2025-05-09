<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



Route::middleware(['auth', 'checkrole:user,admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('sanpham', SanphamController::class);
    Route::get('/api/sanpham', [SanphamController::class, 'index'])->name('sanpham.index');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders', [OrderController::class, 'history'])->name('orders.history');
    Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
});



