<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ProductController extends Controller
{

    public function index()
    {
        // Fetch 3 random products from the database
        $products = Listing::inRandomOrder()->take(3)->get();

        // Pass the products to the view
        return view('home', compact('products'));
    }

    public function edit($id){
    $listing = Listing::findOrFail($id);
    return view('productedit', compact('listing'));
    }

    public function update(Request $request, $id){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'packaging' => 'nullable',
        'weight' => 'nullable|numeric',
        'weight_unit' => 'nullable|string|max:10',
        'quantity_inhand' => 'nullable|integer',
        'price' => 'required|numeric',
        'currency' => 'nullable|string|max:3',
        'age' => 'nullable|integer',
        'expiry' => 'nullable|date'
    ]);

    $listing = Listing::findOrFail($id);
    $listing->update($request->all());

    return redirect()->route('product.show', ['id' => $id])->with('success', 'Listing updated successfully');}

    public function destroy($id){
    $listing = Listing::findOrFail($id);
    $listing->delete();

    return redirect()->route('listings.index')->with('success', 'Product deleted successfully!');
    }

}
