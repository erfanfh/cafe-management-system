@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">نام محصول</label>
            <input name="product" type="text" class="form-control" aria-describedby="emailHelp" value="{{ $product->name }}">
            @error('product')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">قیمت</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        @php($product->status ? $inStorage = "selected" : $outStorage = "selected")
        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="1" {{ isset($inStorage) ? $inStorage : "" }}>موجود</option>
                <option value="0" {{ isset($outStorage) ? $outStorage : "" }}>ناموجود</option>
            </select>
            @error('status')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
    <form action="{{ route('products.destroy', $product->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">حذف</button>
    </form>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
@endsection
