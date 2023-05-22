@extends('Admin.layouts.master')


@section('title')
    | Products
@endsection

@section('css')
@endsection

@section('page_name')
    Products
@endsection

@section('page_header')
All Products
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
                {{-- <th>Product Description</th> --}}
                {{-- <th>Product Price</th>
                <th>Product Quantity</th> --}}
                {{-- <th>Category</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

            <tr>

                <td>{{$loop->iteration}}</td>
                <td>{{$product->name}}</td>
                <td><img src="{{asset('uploads/products')}}/{{$product->image}}" alt="product image" width="200" height="200">
                 </td>
                {{-- <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category->name}}</td> --}}
                <td>
                    <a href="{{route('products.show', $product->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-folder">
                    </i> Details</a>
                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning m-1 btn-sm"><i class="fas fa-pencil-alt">
                    </i> Edit</a>
                    <form action="{{route('products.destroy', $product->id)}}" class="d-inline" method="post">
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
