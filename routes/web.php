<?php

use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\HomeController;
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

// the home route goes right here
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
Route::get('/users', [HomeController::class, 'users'])->middleware('auth');
Route::post('/friend-requests', [FriendRequestController::class, 'store'])->name('friend-requests.store')->middleware('auth');
Route::post('/friend-requests/{friendRequest}/accept', [FriendRequestController::class, 'accept'])->name('friend-requests.accept')->middleware('auth');
Route::post('/friend-requests/{friendRequest}/reject', [FriendRequestController::class, 'reject'])->name('friend-requests.reject')->middleware('auth');

// the message routes go right here

Route::get('/chat', function () {
    return view('chat.index');
})->middleware('auth');



Route::get('/', function () {
    return view('welcome');
});

// auth routes go right here
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/users/create', [UserController::class, 'store']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





