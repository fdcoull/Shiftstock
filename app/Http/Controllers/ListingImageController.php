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
            'images.*' => 'required|image|mimes:png,jpg,jpeg'

        ]);

        //Upload files
        $imageData = [];
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = $listing['id'] . '-' . time() . '-' . $key . '.' . $extension;

                $path = "uploads/";
                $fullPath = $path . $filename;

                $file->move(public_path($path), $filename);

                $imageData[] = [
                    'listing_id' => $listing->id,  // Ensure $listing->id is accessible and correct
                    'location' => $fullPath  // Ensure this concatenation results in a correct file path
                ];
            }

            $request->validate([
                'images.*' => 'required|image|mimes:png,jpg,jpeg'

            ]);

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

            return redirect('/')->with('success', 'Images updated successfully!');
        } catch (ModelNotFoundException $e) {
            return back()->withErrors('Listing not found.');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred while uploading images.');
        }

        //Remove old image references from table
        ListingImage::where('listing_id', $listing['id'])->delete();

        //Insert new image references into table
        try {
            ListingImage::insert($imageData);
        } catch (\Exception $e) {
            return redirect('/aboutus');
        }

        return redirect()->route('listings.index')->with('success', 'Listing created successfully!');

    }
}
