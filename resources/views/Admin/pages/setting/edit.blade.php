@extends('Admin.layouts.master')


@section('title')
    | Chefs
@endsection

@section('css')
@endsection

@section('page_name')
    Chefs
@endsection

@section('page_header')
    Edit Chef : {{$chef->name}}
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('chefs.update', $chef->id) }}" enctype="multipart/form-data">

            @csrf
            @method('put')
            <div class="card-body">

                <div class="form-group">
                    <label for="chef_name">Chef Name</label>
                    <input type="text" class="form-control" name="name" id="chef_name"
                        placeholder="Enter Chef name" value="{{ old('name') ?? $chef->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Chef Description</label>
                    <textarea type="text" class="form-control" rows="3" name="description" id="description"
                        placeholder="Enter Chef Description">{{ old('description') ?? $chef->description }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <img src="{{asset('uploads/chefs/')}}/{{ $chef->image}}" class="img-thumbnail m-2" width="250" alt="chef img">

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
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
@endsection
