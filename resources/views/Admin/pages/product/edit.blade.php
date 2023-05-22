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
    Edit Product : {{$product->name}}
@endsection



@section('content')
    <div class="card card-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">

            @csrf
            @method('put')
            <div class="card-body">

                <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" name="name" id="product_name"
                        placeholder="Enter Product name" value="{{ old('name') ?? $product->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea type="text" class="form-control" rows="3" name="description" id="description"
                        placeholder="Enter Product Description">{{ old('description') ?? $product->description }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price </label>
                    <input type="number" class="form-control" name="price" id="price"
                        placeholder="Enter Product Price" value="{{ old('price') ?? $product->price }}">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantity">Product Quantity </label>
                    <input type="number" class="form-control" name="quantity" id="quantity"
                        placeholder="Enter Product Quantity" value="{{ old('quantity') ?? $product->quantity }}">
                    @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <img src="{{asset('uploads/products/')}}/{{ $product->image}}" class="img-thumbnail m-2" width="250" alt="product img">
                <div class="custom-file mb-2">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Choose Product Image</label>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Category </label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Choose Product Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == old('category_id') || $category->id == $product->category_id)>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
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
