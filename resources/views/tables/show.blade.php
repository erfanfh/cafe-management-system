@extends('layouts.master')
@section('title', $table->name . " ($key) " )
@section('content')
    <div class="display-6"> میز {{$table->name . "(" . $key .")"}}</div>
    <div class="d-flex">
        <div class="h3">افزودن سفارش</div>
        <form id="addProduct" action="{{ route('orders.store', $table) }}" method="post">
            @csrf
            <div class="mb-3 d-flex gap-3">
                <select class="form-select" onchange="document.getElementById('addProduct').submit()" name="name">
                    <option selected disabled>سفارش</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    <div class="h3">سفارشات</div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php($totalPrice = 0)
            @foreach($table->products as $key => $product)
                @php($totalPrice += $product->price)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td><a class="link-danger" href="{{ route('orders.destroy', $product->id) }}">حذف</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
