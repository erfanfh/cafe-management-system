<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Order;
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
        return view('tables.index', ['tables' => Table::all()]);
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
        return view('tables.edit', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table): RedirectResponse
    {
        if (is_null($request->tableName))
        {
            $table->update([
                'status' => $request->status,
            ]);
        } else {
            $table->update([
                'name' => $request->tableName,
                'status' => $request->status,
            ]);
        }

        return redirect()->back()->with('success', 'میز موردنظر ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();

        return redirect()->route('tables.index');
    }
}
