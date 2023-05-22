<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Home;
use App\Models\Message;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $chefs = Chef::get();
        $categories = Category::get();
        // $products = Product::get();
        return view('EndUser.index', compact('chefs', 'categories'));
    }

    public function chefs()
    {
        $chefs = Chef::get();
        return view('EndUser.pages.chefs', compact('chefs'));
    }

    public function contact()
    {
        return view('EndUser.pages.contact');
    }

    public function menu()
    {
        $categories = Category::get();
        $products = Product::get();
        return view('EndUser.pages.menu', compact('categories', 'products'));
    }

    public function gallery()
    {
        return view('EndUser.pages.gallery');
    }

    public function message(StoreHomeRequest $request)
    {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', 'Message Send Successfully');
    }
}
