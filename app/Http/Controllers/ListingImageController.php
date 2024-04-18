<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListingImageController extends Controller
{
    public function index(int $id) {
        return view('temp/product-image', ['listing' => Listing::find($id)]);
    }

    public function store(Request $request, int $id) {
        $listing = Listing::find($id);

        if (auth()->user()->id !== $listing['user_id']) {
            return redirect('new-listing');
        }

        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageData = [];


        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $listing['id'] . '-' . time() . '-' . $key . '.' . $extension;

                $path = "uploads/listing-images/";

                $file->move($path, $filename);

                $imageData[] = [
                    'listing_id' => $listing['id'],
                    'location' => $path . $filename
                ];
            }
        }

        // Delete previous images
        ListingImage::where('listing_id', $listing['id'])->delete();

        // Insert new image references into table
        ListingImage::insert($imageData);

        return redirect()->route('product.show', ['id' => $id])->with('success', 'Images updated successfully!');
    }
}
