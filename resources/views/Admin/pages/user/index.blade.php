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
    All Chefs
@endsection



@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>

                    <td>
                        <a href="{{  route('admin.users.edit', $user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pen"></i> Edit</a>
                        <form action="{{ route('admin.users.destroy', $user->id)  }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            {{-- <a href="" ><i class="fa fa-trash"></i> Delete</a> --}}
                        </form>
                    </td>


                </tr>
            @endforeach

        </tbody>
    </table>
@endsection


@section('scripts')
@endsection
