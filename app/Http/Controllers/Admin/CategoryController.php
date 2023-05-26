<?php
namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::get();
        $categories = Category::withCount('products')->orderBy('products_count', 'DESC')->get();

        return view('Admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        Category::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('Admin.pages.category.show', compact('products', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {

        $product = Product::where('category_id', $category->id)->first();

        if(!$product)
        {
            $category->delete();
            $request->session()->flash('success', 'Category Deleted Successfully');

        }else{
            $request->session()->flash('destroy_category', 'Category Has Products, U cant delete it');
        }


        return redirect()->back();
    }
}
