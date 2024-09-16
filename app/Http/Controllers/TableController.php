<?php

namespace App\Http\Controllers;

use App\Actions\Tables\CreateTable;
use App\Actions\Tables\UpdateTable;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        return view('tables.index', ['tables' => Table::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request, CreateTable $createTable): RedirectResponse
    {
        $createTable->handle($request);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table, int $key): View|Factory|Application
    {
        $products = Product::all();

        return view('tables.show', ['table' => $table, 'key' => $key, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table): Application|Factory|View
    {
        return view('tables.edit', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table, UpdateTable $updateTable): RedirectResponse
    {
        if (is_null($request->tableName)) {
            $updateTable->status($request, $table);
        } else {
            $updateTable->update($request, $table);
        }

        return redirect()->back()->with('success', 'میز موردنظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table): RedirectResponse
    {
        $table->delete();

        return redirect()->route('tables.index');
    }
}
