@extends('Admin.layouts.master')


@section('title')
    | User update
@endsection

@section('css')
@endsection

@section('page_name')
    Users
@endsection

@section('page_header')
    Edit User : {{ $user->name}}
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" >

            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" name="name" id="user_name"
                        placeholder="Enter User name" value="{{ old('name') ?? $user->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter User Email " value="{{ old('email') ?? $user->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter User Password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option >Choose User Role:</option>
                        <option @selected($user->role == 'user') value="user">User</option>
                        <option @selected($user->role == 'admin') value="admin">Admin</option>
                    </select>
                    @error('role')
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
