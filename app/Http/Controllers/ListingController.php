<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {
        if (request()->has('query')) {
            $listings = Listing::where('title', 'like', '%'. request()->get('query', '') . '%')->orWhere('description', 'like', '%'. request()->get('query', '') . '%')->orderBy('id', 'desc')->get();
        }
        else {
            $listings = Listing::orderBy('id', 'desc')->get();
        }

        return view('temp/listings', ['listings' => $listings]);
    }

    public function newListing(Request $request) {
        //Validate fields
        $fields = $request->validate([
            'title' => ['required','string','min:3','max:256'],
            'description' => ['required','string','max:1000'],
            'packaging' => ['nullable','string','max:256'],
            'weight' => ['required','numeric','min:0.01','max:100000'],
            'weight_unit' => ['required','string','in:kg,lb,oz,g'],
            'quantity_inhand' => ['required','integer','min:1'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'currency' => ['required', 'string', 'size:3'],
            'age' => ['nullable','date'],
            'expiry' => ['nullable','date','after:age']
        ]);

        //Strip tags
        $fields['title'] = strip_tags($fields['title']);
        $fields['description'] = strip_tags($fields['description']);
        $fields['packaging'] = strip_tags($fields['packaging']);
        $fields['weight_unit'] = strip_tags($fields['weight_unit']);
        $fields['currency'] = strip_tags($fields['currency']);

        $fields['user_id'] = auth()->id();

        Listing::create($fields);

        return redirect('/');
    }
}
