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
    Create New Category
@endsection


@section('content')
    <div class="card card-success">
        <div class="card-header">
            {{-- <h3 class="card-title"></h3> --}}
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        @if (session('success'))
            <div class="alert alert-success m-2">{{ session('success') }}</div>
        @endif


        @error('name')
            <div class="alert alert-danger m-2">{{ $message }}</div>
        @enderror
        <form method="POST" action="{{ route('categories.store') }}">

            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="category_name"
                        placeholder="Enter Category name" value="{{old('name')}}">
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
@endsection
