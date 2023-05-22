@extends('Admin.layouts.master')


@section('title')
    | Categories
@endsection

@section('css')
@endsection

@section('page_name')
    Categories
@endsection

@section('page_header')
    All Categories
@endsection



@section('content')
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('destroy_category'))
        <div class="alert alert-danger">{{ session('destroy_category') }}</div>
    @enderror
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Products</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning m-1">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection


@section('scripts')
@endsection
