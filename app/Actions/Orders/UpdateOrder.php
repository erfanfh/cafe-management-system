<?php

namespace App\Actions\Orders;

use App\Actions\Action;

class UpdateOrder extends Action
{
    public function handle($order): void
    {
        $order->update([
            $order->quantity++,
            $order->save()
        ]);
    }
}
