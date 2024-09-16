<?php

namespace App\Http\Controllers;

use App\Actions\Products\CreateProduct;
use App\Actions\Products\UpdateProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view('products.index', ['products' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, CreateProduct $createProduct): RedirectResponse
    {
        $createProduct->handle($request);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Application|Factory|View
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, UpdateProduct $updateProduct): RedirectResponse
    {
        $updateProduct->handle($request, $product);

        return redirect()->back()->with('success', 'محصول ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
