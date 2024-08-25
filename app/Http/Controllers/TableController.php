<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Models\Product;
use App\Models\Table;
use http\Header\Parser;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TableController extends Controller
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
    public function store(StoreTableRequest $request): RedirectResponse
    {
        Table::create([
            'name' => $request->name,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table , int $key): View|Factory|Application
    {
        $products = Product::all();
        return view('tables.show', ['table' => $table, 'key' => $key, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table): RedirectResponse
    {
        $table->update([
            'status' => $request->status,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
