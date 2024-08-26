@extends('layouts.master')
@section('title', 'داشبورد')
@section('content')
    <div class="h1 mb-5">میز ها</div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($tables as $key => $table)
            <div class="col">
                <div class="card {{ $table->status ? "text-bg-success" : "text-bg-danger" }}">
                    <div class="card-body">
                        <h5 class="card-title"> میز {{ $table->name }} ({{ $key + 1 }})</h5>
                        <form id="statusForm{{$key}}" action="{{ route('tables.update', $table->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 d-flex gap-3">
                                <select class="form-select" onchange="document.getElementById('statusForm{{$key}}').submit()" name="status">
                                    <option disabled selected>وضعیت</option>
                                    <option value="1">خالی</option>
                                    <option value="0">پر</option>
                                </select>
                                <a href="{{ route('tables.show', [$table->id, "key" => $key + 1]) }}" class="btn btn-primary">مدیریت</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">وضعیت {{ $table->status ? "خالی" : "پر" }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
