<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $products = Product::all();
    $user = Auth::user();

    $addedProductsCount = $user->cartproducts()->count();
        return view('created-products',compact('products','addedProductsCount'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        request()->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);

        $image = $request->image;
        $imageName = hash('sha256', file_get_contents($image)) . "." . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/images'), $imageName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'user_id' => $request->user_id
        ]);

        return back()->with('success', 'product created succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
