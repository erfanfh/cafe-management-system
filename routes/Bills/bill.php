<?php

use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;

Route::post('bills/{table}/{quantity}/{price}', [BillController::class, 'store'])->name('bills.store');

Route::get('bills', [BillController::class, 'index'])->name('bills.index');
