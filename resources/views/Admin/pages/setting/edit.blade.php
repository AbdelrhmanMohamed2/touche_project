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
    Edit Setting :{{ $setting->name }}
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}" >

            @csrf
            @method('put')
            <div class="card-body">

                <div class="form-group">
                    <label for="value">Value</label>
                    <textarea type="text" class="form-control" rows="3" name="value" id="value"
                        placeholder="Enter Value .. ">{{ old('value') ?? $setting->value }}</textarea>
                    @error('value')
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
