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
All Product For : {{$category->name}}
@endsection



@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->image}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a href="{{route('products.show', $product->id)}}" class="btn btn-info">Show</a>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning m-1">Edit</a>
                    <form action="{{route('products.destroy', $product->id)}}" class="d-inline" method="post">
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
