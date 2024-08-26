@extends('layouts.master')
@section('title', $table->name)
@section('content')
    <form action="{{ route('tables.update', $table->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">نام میز</label>
            <input name="tableName" type="text" class="form-control" aria-describedby="emailHelp" value="{{ $table->name }}">
            @error('tableName')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        @php($table->status ? $inStorage = "selected" : $outStorage = "selected")
        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="1" {{ isset($inStorage) ? $inStorage : "" }}>خالی</option>
                <option value="0" {{ isset($outStorage) ? $outStorage : "" }}>پر</option>
            </select>
            @error('status')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
    <form action="{{ route('tables.destroy', $table->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">حذف</button>
    </form>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
@endsection
