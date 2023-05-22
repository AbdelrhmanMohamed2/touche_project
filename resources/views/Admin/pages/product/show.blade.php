@extends('Admin.layouts.master')


@section('title')
    | Products
@endsection

@section('css')

{{-- <link rel="stylesheet" href="{{ asset('Admin/dist/css/show_product.css') }}"> --}}
@endsection

@section('page_name')
    Products
@endsection

@section('page_header')
    Product :
@endsection


@section('content')
    <div class="card card-success">
        <div class="container py-4 my-4 mx-auto d-flex flex-column">
            <div class="header">
                <div class="row r1">
                    <div class="col-md-9 abc">
                        <h1> {{ $product->name }}</h1>
                    </div>

                </div>
            </div>
            <div class="container-body mt-4">
                <div class="row r3">
                    <div class="col-md-5 p-0 klo">
                        <p class=""> {{ $product->description }}</p>
                        <ul>
                            <li>Price : {{ $product->price }}</li>
                            <li>Quantity : {{ $product->quantity }}</li>
                            <li>Category Name : {{ $product->category->name }}</li>

                        </ul>
                    </div>
                    <div class="col-md-7"> <img
                            src="{{ asset('uploads/products/') }}/{{$product->image}}"
                            width="90%" height="95%"> </div>
                </div>
            </div>
            {{-- <div class="footer d-flex flex-column mt-5">
                <div class="row r4">
                    <div class="col-md-2 myt des"><a href="#">Description</a></div>
                    <div class="col-md-2 myt "><a href="#">Review</a></div>
                    <div class="col-md-2 mio offset-md-4"><a href="#">ADD TO CART</a></div>
                    <div class="col-md-2 myt "><button type="button" class="btn btn-outline-warning"><a href="#">BUY
                                NOW</a></button></div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection


@section('scripts')
@endsection
