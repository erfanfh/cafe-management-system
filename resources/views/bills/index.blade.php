@extends('layouts.master')
@section('title', 'مدیریت میزها')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="display-6">سفارشات</div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                به ترتیب
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=-created_at') }}">جدیدترین سفارش</a></li>
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=created_at') }}">قدیمی ترین سفارش</a></li>
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=-price') }}">بیشترین قیمت</a></li>
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=price') }}">کمترین قیمت</a></li>
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=-quantity') }}">بیشترین سفارش</a></li>
                <li><a class="dropdown-item" href="{{ route('bills.index', 'sort=quantity') }}">کمترین سفارش</a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">هزینه</th>
                <th scope="col">تعداد</th>
                <th scope="col">تاریخ</th>
                <th scope="col">زمان</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $key => $bill)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ number_format($bill->price) }}</td>
                    <td>{{ $bill->quantity }}</td>
                    <td>{{ $bill->created_at->format('m/d/Y') }}</td>
                    <td>{{ $bill->created_at->format('H:m:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
