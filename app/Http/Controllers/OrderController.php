<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, Table $table)
    {
        if (empty($table->orders->where('product_id', $request->name)->all()))
        {
            $table->products()->attach($request->name);
        } else {
            $order = $table->orders->where('product_id', $request->name)->first();
            $order->quantity++;
            $order->save();
        }

        return redirect()->back()->with('success', 'محصول موردنظر اضافه شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        $order->update([
            $order->quantity++,
            $order->save()
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if ($order->quantity > 1)
        {
            $order->update([
                $order->quantity--,
                $order->save()
            ]);
        } else {
            $order->delete();
        }

        return redirect()->back();
    }
}
