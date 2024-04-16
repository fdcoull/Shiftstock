<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Listing;
use App\Models\ListingImage;

class ProductController extends Controller
{
    public function show($id) {
        $listing = Listing::find($id);
        if (!$listing) {
            // Redirect or show an error if the listing is not found
            return redirect('/')->with('error', 'Listing not found.');
        }

        // Fetch the first image of the listing from the ListingImage model
        $listingImages = ListingImage::where('listing_id', $id)->first();

        return view('product', compact('listing', 'listingImages'));
    }

    public function index()
    {
        // Fetch 3 random products from the database
        $products = Listing::inRandomOrder()->with('images')->take(3)->get();

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

        return redirect()->route('product.show', ['id' => $id])->with('success', 'Listing updated successfully');
    }

    public function destroy($id){
        $listing = Listing::findOrFail($id);

        // Check if the current user is authorized to delete the listing
        if (auth()->user()->id !== $listing->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        // Delete associated images
        $images = ListingImage::where('listing_id', $listing->id)->get();
        foreach ($images as $image) {
            $file_path = public_path($image->location);
            if (File::exists($file_path)) {
                File::delete($file_path);  // Delete the image file
            }
            $image->delete();  // Delete the database record
        }

        $listing->delete();

        return redirect()->route('listings.index')->with('success', 'Product deleted successfully!');
    }

}
