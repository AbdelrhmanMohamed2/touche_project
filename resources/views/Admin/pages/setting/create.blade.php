@extends('Admin.layouts.master')


@section('title')
    | Settings
@endsection

@section('css')
@endsection

@section('page_name')
    Settings
@endsection

@section('page_header')
    Add New Chef
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('chefs.store') }}" enctype="multipart/form-data">

            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="chef_name">Chef Name</label>
                    <input type="text" class="form-control" name="name" id="chef_name"
                        placeholder="Enter Chef name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Chef Description</label>
                    <textarea type="text" class="form-control" rows="3" name="description" id="description"
                        placeholder="Enter Chef Description">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>



                <div class="custom-file mb-2">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Choose Chef Image</label>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
