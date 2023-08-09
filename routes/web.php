<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StationController;

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

// Common Resource Routes:
// 
// index - Show all resources
// show - Show single resource
// create - Show form to create new resource
// store - Store new resource
// edit - Show form to edit resource
// update - Update resource
// destroy - Delete resource  

Route::get('/', function () {
    return view('welcome');
});

// auth routes go right here
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/users/create', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// the products routes go right here
Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');
Route::get('/products/details', [ProductController::class, 'show'])->name('show.products')->middleware('auth');



