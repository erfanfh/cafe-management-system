<?php

use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;

Route::resource('tables', TableController::class)->except('show');

Route::get('tables/{table}/{key}', [TableController::class, 'show'])->name('tables.show');
