@extends('layouts.master')
@section('title', 'مدیریت محصولات')
@section('content')
    <div class="h2 mb-3">محصولات</div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">وضعیت</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td class="{{ $product->status ? "text-success" : "text-danger" }}">{{ $product->status ? "موجود" : "ناموجود" }}</td>
                    <td class="d-flex gap-2">
                        <a class="link-secondary" href="{{ route('products.edit', $product->id) }}">ویرایش</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
