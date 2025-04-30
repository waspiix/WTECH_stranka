<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
<<<<<<< HEAD
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\KosikController;


>>>>>>> 6935141d83192e9c5c61529f8cd87b9139ecfb33

// user controller
Route::resource('users', UserController::class);



// breezze generated

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//index
Route::get('/', function () {
    return view('index');
})->name('home');


// Základné filtrovanie podľa pohlavia
Route::get('/produkty/{pohlavie}/{kategoria?}', [ProductController::class, 'zobraz'])->name('produkty.zobraz');

// Filtrovanie podľa pohlavia + kategórie
// Route::get('/produkty/{pohlavie}/{kategoria}', [ProductController::class, 'index'])->name('produkty.filtruj');


//profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
});

//update profile
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::post('/profile/address/update', [UserController::class, 'updateAddress'])->name('profile.address.update');

// kosik
Route::resource('kosik', KosikController::class)->only(['index', 'store', 'update', 'destroy']);
