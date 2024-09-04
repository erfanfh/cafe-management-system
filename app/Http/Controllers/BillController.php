<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = QueryBuilder::for(Bill::class)
            ->allowedSorts(['price', 'quantity', 'created_at'])
            ->defaultSort('created_at')
            ->get();

        return view('bills.index', ['bills' => $bills]);
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
    public function store(Table $table, string $price, string $quantity)
    {
        Bill::create([
            'quantity' => $quantity,
            'price' => $price,
        ]);

        $table->products()->detach();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
