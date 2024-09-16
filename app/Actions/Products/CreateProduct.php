<?php

namespace App\Actions\Products;

use App\Actions\Action;
use App\Models\Product;

class CreateProduct extends Action
{
    public function handle($request): void
    {
        Product::create([
            'name' => $request->product,
            'price' => $request->price,
            'description' => $request->description,
        ]);
    }
}
