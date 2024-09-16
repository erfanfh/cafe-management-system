<?php

namespace App\Actions\Orders;

use App\Actions\Action;

class DeleteOrder extends Action
{
    public function handle($order): void
    {
        $order->update([
            $order->quantity--,
            $order->save()
        ]);
    }
}
