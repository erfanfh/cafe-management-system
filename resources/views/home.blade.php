@extends('layouts.master')
@section('title', 'داشبورد')
@section('content')
    <div class="h1 mb-5">میز ها</div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($tables as $key => $table)
            @switch($table->status)
                @case(1)
                    @php($status = "فعال")
                    @php($cardBg = "text-bg-success")
                    @break
                @case(2)
                    @php($status = "پر")
                    @php($cardBg = "text-bg-danger")
                    @break
                @case(3)
                    @php($status = "غیر فعال")
                    @php($cardBg = "text-bg-secondary")
                    @break
            @endswitch
            <div class="col">
                <div class="card {{ $cardBg }}">
                    <div class="card-body">
                        <h5 class="card-title"> میز {{ $table->name }} ({{ $key + 1 }})</h5>
                        <form id="statusForm{{$key}}" action="{{ route('tables.update', $table->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 d-flex gap-3">
                                <select class="form-select" onchange="document.getElementById('statusForm{{$key}}').submit()" name="status">
                                    <option selected disabled>وضعیت میز</option>
                                    <option value="1">فعال</option>
                                    <option value="2">پر</option>
                                    <option value="3">غیرفعال</option>
                                </select>
                                <a href="{{ route('tables.show', [$table->id, "key" => $key + 1]) }}" class="btn btn-primary">مدیریت</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">وضعیت {{ $status }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
