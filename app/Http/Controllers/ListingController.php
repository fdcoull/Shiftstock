<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {
        // Fetch listings based on search query or retrieve all listings
        $listings = request()->has('query') ?
                    Listing::where('title', 'like', '%'. request()->get('query', '') . '%')
                           ->orWhere('description', 'like', '%'. request()->get('query', '') . '%')
                           ->orderBy('id', 'desc')->get() :
                    Listing::orderBy('id', 'desc')->get();

        // Loop through each listing and eager load its images
        foreach ($listings as $listing) {
            $listing->load('images'); // Ensure 'images' is the correct relationship name in your Listing model
            $listing->load('seller');
        }

        // Return the view with listings data
        return view('listings', compact('listings'));
    }

    public function newListing(Request $request) {
        //Validate fields
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'max:10000',
            'packaging' => 'max:256',
            'weight' => 'numeric',
            'weight_unit' => ['min:1', 'max:4'],
            'quantity_inhand' => 'integer',
            'price' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'currency' => ['required', 'min:3', 'max:3'],
            'age' => 'numeric',
            'expiry' => 'date'
        ]);

        //Strip tags
        $fields['title'] = strip_tags($fields['title']);
        $fields['description'] = strip_tags($fields['description']);
        $fields['packaging'] = strip_tags($fields['packaging']);
        $fields['weight_unit'] = strip_tags($fields['weight_unit']);
        $fields['currency'] = strip_tags($fields['currency']);

        $fields['user_id'] = auth()->id();

        $listing = Listing::create($fields);

        // After creating the listing, manage images
        // Instantiate the image controller and call its store method
        $imageController = new ListingImageController();
        return $imageController->store($request, $listing->id);

    }

    public function search(Request $request) {
        $query = $request->input('query');
        $listings = Listing::where('title', 'like', '%'.$query.'%')
                            ->orWhere('description', 'like', '%'.$query.'%')
                            ->get();
        return view('listings', compact('listings'));
    }

}
