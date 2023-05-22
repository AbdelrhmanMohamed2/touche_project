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
                <th>Chef Name</th>
                <th>Chef Image</th>
                <th>Chef Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chefs as $chef)

            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$chef->name}}</td>
                <td><img src="{{asset('uploads/chefs')}}/{{$chef->image}}" alt="chef image" width="200" height="200">
                 </td>
                <td>{{$chef->description}}</td>

            <td>
                {{-- <a href="{{ route('chefs.show', $chef->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-folder">
                    </i> Details</a> --}}
                <a href="{{ route('chefs.edit', $chef->id) }}" class="btn btn-warning m-1 btn-sm"><i
                        class="fas fa-pencil-alt">
                    </i> Edit</a>
                <form action="{{ route('chefs.destroy', $chef->id) }}" class="d-inline" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>

            </tr>

            @endforeach

        </tbody>
    </table>
@endsection


@section('scripts')
@endsection
