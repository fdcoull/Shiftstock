<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function newListing(Request $request) {
        $fields = $request->validate([
            'title' => 'required',
            'price' => 'required'
        ]);

        $fields['title'] = strip_tags($fields['title']);
        $fields['description'] = strip_tags($fields['description']);
        $fields['packaging'] = strip_tags($fields['packaging']);
        $fields['weight'] = strip_tags($fields['weight']);
        $fields['weight_unit'] = strip_tags($fields['weight_unit']);
        $fields['price'] = strip_tags($fields['price']);
        $fields['currency'] = strip_tags($fields['currency']);
        $fields['age'] = strip_tags($fields['age']);

        $fields['user_id'] = auth()->id();

        Listing::create($fields);

        return redirect('/');
    }
}
