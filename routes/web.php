<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Listing
Route::prefix('listing')->group(function () {
    Route::get('/create', [ListingController::class, 'create'])->name('listing.create');
    Route::get('/manage', [ListingController::class, 'manage'])->name('listing.manage');
    Route::post('/store', [ListingController::class, 'store'])->name('listing.store');
    Route::delete('/{id}', [ListingController::class, 'destroy'])->name('listing.destroy');
    Route::get('/{id}', [ListingController::class, 'show'])->name('listings.show');
    Route::get('/edit/{id}', [ListingController::class, 'edit'])->name('listing.edit');
    Route::put('/update/{id}', [ListingController::class, 'update'])->name('listing.update');
});

// Register
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Login
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

//Logout
Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('auth')->name('logout');

