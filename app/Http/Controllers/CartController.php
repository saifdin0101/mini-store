<?php

namespace App\Http\Controllers;

use App\Models\UserProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $addedProducts = $user->cartProducts()->withPivot('quantity')->get();
        return view('add-to-cart', compact('addedProducts'));
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

        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $user = Auth::user();

        $user->cartProducts()->attach($request->product_id, ['quantity' => $request->quantity]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = Auth::user();
    

        $user->cartProducts()->detach($id);
    

        return back();
    }
    
}
