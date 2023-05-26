@extends('Admin.layouts.master')


@section('title')
    | Users
@endsection

@section('css')
@endsection

@section('page_name')
    Users
@endsection

@section('page_header')
    Add New User
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.users.store') }}" >

            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" name="name" id="user_name"
                        placeholder="Enter User name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter User Email " value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">User Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter User Password" >
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <select name="role" id="role" class="form-control">
                        <option >Choose User Role:</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('role')
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
