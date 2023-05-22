<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get(['id', 'name' , 'image']);
        return view('Admin.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('Admin.pages.product.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $image = $request->file('image');

        $image_new_name = uniqid('', true) . '.' . $image->extension();

        $image->move(public_path('uploads/products'), $image_new_name);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => $image_new_name,
        ]);

        return redirect()->back()->with('success', 'Product Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('Admin.pages.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get(['id', 'name']);

        return view('Admin.pages.product.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $image = $request->file('image');

        if($image)
        {
            File::delete(public_path('uploads/products') . '/' . $product->image);

            $image_new_name = uniqid('', true) . '.' . $image->extension();
            $image->move(public_path('uploads/products'), $image_new_name);

        }


        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'image' => ($image_new_name ?? $product->image),
        ]);

        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        File::delete(public_path('uploads/products') . '/'. $product->image);

        $product->delete();

        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
