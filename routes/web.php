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
Route::get('/home', function () {
    return view('home');
})->name('home');;

Route::get('/register', function () {
    return view('register');
})->name('register');;

Route::get('/login', function () {
    return view('login');
})->name('login');;

Route::get('/forgotpassword', function () {
    return view('forgotpassword');
})->name('forgotpassword');;

Route::get('/logout', function () {
    return view('temp/logout');
})->name('temp/logout');;

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');;

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');;

Route::get('/cart', function () {
    return view('cart');
})->name('cart');;


// Back-end
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/logout', [UserController::class, 'logout']);
Route::post('/user/login', [UserController::class, 'login']);

// Listings
// Front-end
Route::get('/new-listing', function () {
    return view('new-listing');
});

Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

Route::get('/product/{id}', function($id) {
    return view('temp/product', ['listing' => Listing::find($id), 'images' => ListingImage::where('listing_id', $id)->get()]);
});

Route::get('/product/{id}/upload', [ListingImageController::class, 'index']);

// Back-end
Route::post('/listings/new', [ListingController::class, 'newListing']);

Route::post('/product/{id}/image', [ListingImageController::class, 'store']);

Route::post('/contact/new', [ContactController::class, 'sendMail']);
