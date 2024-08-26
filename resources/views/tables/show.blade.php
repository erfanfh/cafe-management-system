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
                    @foreach($products as $order)
                        <option value="{{$order->id}}">{{ $order->name . " - " . number_format($order->price) . " تومان "}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="h3">سفارشات</div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">تعداد</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @php($totalPrice = 0)
            @php($totalQuantity = 0)
            @foreach($table->orders as $key => $order)
                @php($totalPrice += $order->product->price * $order->quantity)
                @php($totalQuantity += $order->quantity)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ number_format($order->product->price) }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('orders.update', $order->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-outline-success" type="submit">افزودن</button>
                        </form>

                        <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit">کاستن</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <div class="h-100 p-5 border border-dark rounded-3 d-flex flex-column justify-content-center align-items-end gap-3">
            <h1>صورتحساب</h1>
            <div>
                تعداد سفارشات :
                <span class="fw-bold fs-large">{{$totalQuantity}}</span>
            </div>
            <div>
                قیمت کل :
                <span class="fw-bold fs-large">{{ number_format($totalPrice) }}</span>
                تومان
            </div>
            <button class="btn btn-primary">پرداخت</button>
        </div>
    </div>
@endsection
