<?php

namespace App\Http\Controllers;

use App\Actions\Bills\CreateBill;
use App\Models\Bill;
use App\Models\Table;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Spatie\QueryBuilder\QueryBuilder;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $bills = QueryBuilder::for(Bill::class)
            ->allowedSorts(['price', 'quantity', 'created_at'])
            ->defaultSort('created_at')
            ->get();

        return view('bills.index', ['bills' => $bills]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Table $table, string $price, string $quantity, CreateBill $createBill): RedirectResponse
    {
        $createBill->handle($quantity, $price, $table);

        return redirect()->route('home');
    }
}
