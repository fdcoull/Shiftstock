<?php

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ListingImageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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

Route::get('/test-bootstrap', function () {
    return view('test-bootstrap');
});

// User
// Front-end

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');

})->name('login');

Route::get('/forgotpassword', function () {
    return view('forgotpassword');
})->name('forgotpassword');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');



// Back-end
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');


Route::post('/forgotpassword', [UserController::class, 'forgotPassword'])->name('forgotpassword');
Route::get('/resetpassword/{token}', [UserController::class, 'resetPasswordForm'])->name('resetpassword.form');
Route::post('/resetpassword/{token}', [UserController::class, 'resetPassword'])->name('resetpassword');


// Listings
// Front-end
Route::get('/new-listing', function () {
    return view('new-listing');
})->name('new-listing');

Route::get('/listings', [ListingController::class, 'index'])->name('listings.index');

Route::get('/listings/search', [ListingController::class, 'search'])->name('listings.search');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('home');

Route::get('/account', [UserController::class, 'account'])->name('account');

Route::post('/upload-profile-picture', [UserController::class, 'uploadProfilePicture'])->name('upload.profile.picture');

Route::get('/user/listings', [ProductController::class, 'userlistings'])->name('user.listings');

Route::get('/product/{id}/upload', [ListingImageController::class, 'index']);


// Route to show individual product
//Route::get('/product/{id}', function($id) {
//    return view('/product', ['listing' => Listing::find($id), 'images' => ListingImage::where('listing_id', $id)->get()]);
//})->name('product.show');

// Change the route to use a dedicated controller method
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Route to show the edit form
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');

// Route to update the item
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

// Route to delete the item
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


// Back-end
Route::post('/listings/new', [ListingController::class, 'newListing']);

Route::post('/product/{id}/image', [ListingImageController::class, 'store']);

Route::post('/contact/new', [ContactController::class, 'sendEmail']);
