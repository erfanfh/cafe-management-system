@extends('layouts.master')
@section('title', 'مدیریت میزها')
@section('content')
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام میز</th>
                <th scope="col">وضعیت</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tables as $key => $table)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $table->name }}</td>
                    <td class="{{ $table->status ? "text-success" : "text-danger" }}">{{ $table->status ? "خالی" : "پر" }}</td>
                    <td class="d-flex gap-2">
                        <a class="link-secondary" href="{{ route('tables.edit', $table->id) }}">ویرایش</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
