<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::resource('orders', OrderController::class)->except(['store']);

Route::post('orders/{table}/', [OrderController::class, 'store'])->name('orders.store');
