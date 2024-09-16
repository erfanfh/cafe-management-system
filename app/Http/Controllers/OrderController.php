<?php

namespace App\Http\Controllers;

use App\Actions\Orders\DeleteOrder;
use App\Actions\Orders\UpdateOrder;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, Table $table): RedirectResponse
    {
        if (empty($table->orders->where('product_id', $request->name)->all())) {
            $table->products()->attach($request->name);
        } else {
            $order = $table->orders->where('product_id', $request->name)->first();
            $order->quantity++;
            $order->save();
        }

        return redirect()->back()->with('success', 'محصول موردنظر اضافه شد');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, UpdateOrder $updateOrder): RedirectResponse
    {
        $order = Order::find($id);

        $updateOrder->handle($order);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, DeleteOrder $deleteOrder): RedirectResponse
    {
        $order = Order::find($id);

        if ($order->quantity > 1) {
            $deleteOrder->handle($order);
        } else {
            $order->delete();
        }

        return redirect()->back();
    }
}
