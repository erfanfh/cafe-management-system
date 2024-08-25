<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('tables', TableController::class)->except('show');

Route::get('tables/{table}/{key}', [TableController::class, 'show'])->name('tables.show');

Route::resource('orders', OrderController::class)->except('store');

Route::post('orders/{table}/', [OrderController::class, 'store'])->name('orders.store');
