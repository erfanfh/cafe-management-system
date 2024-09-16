<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

require __DIR__ . '/Tables/table.php';

require __DIR__ . '/Orders/order.php';

require __DIR__ . '/Products/product.php';

require __DIR__ . '/Bills/bill.php';
