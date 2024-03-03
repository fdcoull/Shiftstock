<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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