@extends('Admin.layouts.master')


@section('title')
    | Messages
@endsection

@section('css')
@endsection

@section('page_name')
    Messages
@endsection

@section('page_header')
All Messages
@endsection



@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->message}}</td>
                <td>
                    {{-- <a href="{{route('products.show', $message->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-folder">
                    </i> Details</a>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning m-1 btn-sm"><i class="fas fa-pencil-alt">
                    </i> Edit</a> --}}
                    <form action="{{route('admin.messages.destroy', $message->id)}}" class="d-inline" method="post">
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
