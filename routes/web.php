<?php

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-bootstrap', function () {
    return view('test-bootstrap');
});

// User
// Front-end
Route::get('/register', function () {
    return view('temp/register');
});

Route::get('/login', function () {
    return view('temp/login');
});

Route::get('/logout', function () {
    return view('temp/logout');
});

// Back-end
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/logout', [UserController::class, 'logout']);
Route::post('/user/login', [UserController::class, 'login']);

// Listings
// Front-end
Route::get('/new-listing', function () {
    return view('temp/new-listing');
});

Route::get('/listings', function() {
    $listings = Listing::orderBy('id', 'desc')->get();
    return view('temp/listings', ['listings' => $listings]);
});

Route::get('/product/{id}', function($id) {
    return view('temp/product', ['listing' => Listing::find($id), 'images' => ListingImage::where('listing_id', $id)->get()]);
});

Route::get('/product/{id}/upload', [ListingImageController::class, 'index']);

// Back-end
Route::post('/listings/new', [ListingController::class, 'newListing']);

Route::post('/product/{id}/image', [ListingImageController::class, 'store']);


