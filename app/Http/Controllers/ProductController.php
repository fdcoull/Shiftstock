<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    public function show($id) {

        info('Reached point n in the code.');
        $listing = Listing::find($id);
        if (!$listing) {
            // Redirect or show an error if the listing is not found
            return redirect('/')->with('error', 'Listing not found.');
        }

        // Fetch the first image of the listing from the ListingImage model
        $listingImages = ListingImage::where('listing_id', $id)->get();

        return view('product', compact('listing', 'listingImages'));
    }

    public function userlistings() {
        // Retrieve user listings from the database
        $userId = Auth::id();
        $listings = Listing::where('user_id', $userId)->get();

        // Pass the listings data to the view
        return view('userlistings', ['listings' => $listings]);
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
        // Fetch listing images
        $listingImages = ListingImage::where('listing_id', $id)->get();
        // Pass both listing and listing images to the view
        return view('productedit', compact('listing', 'listingImages'));
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
            'expiry' => 'nullable|date',
            //'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Update image validation rules
            ]);

        try {
            // Find the listing
            $listing = Listing::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Listing not found.');
        }

        // Update listing details
        $listing->update($request->only('title', 'description', 'packaging', 'weight', 'weight_unit', 'quantity_inhand', 'price', 'currency', 'age', 'expiry'));

        // Handle image deletion
        if ($request->has('delete_images')) {
            // Delete selected images
            foreach ($request->delete_images as $imageId) {
                $image = ListingImage::findOrFail($imageId);
                // Delete image file from storage
                if (File::exists(public_path($image->location))) {
                    File::delete(public_path($image->location));
                }
                // Delete image record from database
                $image->delete();
            }
        }

        // Handle image upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = $listing->id . '-' . time() . '-' . Str::random(5) . '.' . $extension; // Ensure unique filename
                $path = "uploads/";
                $image->move($path, $filename);

                // Create a new ListingImage record for each uploaded image
                ListingImage::create([
                    'listing_id' => $listing->id,
                    'location' => $path . $filename
                ]);
            }
        }

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
