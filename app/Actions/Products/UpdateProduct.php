<?php

namespace App\Actions\Products;

use App\Actions\Action;

class UpdateProduct extends Action
{
    public function handle($request, $product): void
    {
        $product->update([
            'name' => $request->product,
            'price' => $request->price,
            'status' => $request->status
        ]);
    }
}
