<?php

use Illuminate\Support\Facades\Route;

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

// Back-end
Route::post('/user/register', [UserController::class, 'register']);