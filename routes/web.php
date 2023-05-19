<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('listing')->group(function () {
    Route::get('/create', [ListingController::class, 'create'])->name('listing.create');
    Route::get('/{id}', [ListingController::class, 'show'])->name('listings.show');
    Route::post('/store', [ListingController::class, 'store'])->name('listing.store');
});