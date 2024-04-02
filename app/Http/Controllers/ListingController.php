<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function newListing(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'max:10000',
            'packaging' => 'max:256',
            'weight' => 'numeric',
            'weight_unit' => ['min:1', 'max:4'],
            'quantity_inhand' => 'integer',
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'min:3', 'max:3'],
            'age' => 'date',
            'expiry' => 'date'
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['description'] = strip_tags($fields['description']);
        $fields['packaging'] = strip_tags($fields['packaging']);
        //$fields['weight'] = $fields['weight'];
        $fields['weight_unit'] = strip_tags($fields['weight_unit']);
        //$fields['quantity_inhand'] = $fields['quantity_inhand'];
        //$fields['price'] = $fields['quantity'];
        $fields['currency'] = strip_tags($fields['currency']);
        //$fields['age'] = $fields['age'];
        //$fields['expiry'] = $fields['expiry'];

        $fields['user_id'] = auth()->id();

        Listing::create($fields);

        return redirect('/');
    }
}
