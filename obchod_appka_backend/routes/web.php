<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KosikController;


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



//profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
});

//update profile
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
Route::post('/profile/address/update', [UserController::class, 'updateAddress'])->name('profile.address.update');

// kosik
Route::resource('/kosik', KosikController::class)->only(['index', 'store', 'update', 'destroy']);

Route::view('/objednavka/1', 'kosik.objednavka.adresa');
Route::view('/objednavka/2', 'kosik.objednavka.platba');
Route::view('/objednavka/3', 'kosik.objednavka.potvrdenie', ['id' => 45]);

// ukaz nahlad jednotliveho produktu
Route::get('/produkt/{id}', [ProductController::class, 'show'])->name('produkt.show');

// search-bar routes
Route::get('/produkty/search', [ProductController::class, 'search'])->name('produkty.search');
Route::get('/produkty/autocomplete', [ProductController::class, 'autocomplete'])->name('produkty.autocomplete');

Route::get('/produkty', [ProductController::class, 'index'])->name('produkty.index');

//admin vytvorenie produktu
Route::post('/admin/produkt/store', [ProductController::class, 'store'])->name('admin.produkt.store');
