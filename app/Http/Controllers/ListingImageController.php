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
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg'

        ]);

        $listing = Listing::find($id);

        //Upload files
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

        //Search for previous images and delete
        $existingImages = ListingImage::where('listing_id', $listing['id'])->get();
        foreach ($existingImages as $existingImage) {
            if (File::exists($existingImage['location'])) {
                File::delete($existingImage['location']);
            }
        }

        //Remove old image references from table
        ListingImage::where('listing_id', $listing['id'])->delete();

        //Insert new image references into table
        ListingImage::insert($imageData);

        return redirect('/');
    }
}
