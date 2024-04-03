<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingImageController extends Controller
{
    public function index(int $id) {
        return view('temp/product-image');
    }
}
