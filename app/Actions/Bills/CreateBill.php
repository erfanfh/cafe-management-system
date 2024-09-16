<?php

namespace App\Actions\Bills;

use App\Actions\Action;
use App\Models\Bill;

class CreateBill extends Action
{
    public function handle($quantity, $price, $table): void
    {
        Bill::create([
            'quantity' => $quantity,
            'price' => $price,
        ]);

        $table->products()->detach();
    }
}
