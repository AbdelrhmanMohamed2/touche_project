<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chef;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreChefRequest;
use App\Http\Requests\UpdateChefRequest;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::get();
        return view('Admin.pages.chef.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChefRequest $request)
    {

        $image = $request->file('image');
        $new_image_name = uniqid('', true) . '.' . $image->extension();
        $image->move(public_path('uploads/chefs'), $new_image_name);
        Chef::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $new_image_name,
        ]);


        return redirect()->back()->with('success', 'Chef Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('Admin.pages.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChefRequest $request, Chef $chef)
    {

        $image = $request->file('image');
        if ($image) {
            File::delete(public_path('uploads/chefs') . '/' . $chef->image);
            $new_image_name = uniqid('', true) . '.' . $image->extension();
            $image->move(public_path('uploads/chefs'), $new_image_name);
        }
        $chef->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => ($new_image_name ?? $chef->image),
        ]);


        return redirect()->back()->with('success', 'Chef Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        File::delete(public_path('uploads/chefs') . '/' . $chef->image);
        $chef->delete();
        return redirect()->back()->with('success', 'Chef Deleted Successfully');
    }
}
