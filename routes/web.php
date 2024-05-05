<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/index');
});

Route::get("/listing/{id}", [ListingController::class, "show"]);
//return view('index')
// Route::get('/index', [IndexController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/index', [IndexController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile-settings', [ProfileSettingsController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-settings', [ProfileSettingsController::class, 'update'])->name('profile.update');
    Route::delete('/profile-settings', [ProfileSettingsController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');

    Route::get("/create-listing", [ListingController::class, "create"])->middleware("auth");
    Route::post("/create", [ListingController::class, "store"])->middleware("auth");


    
});

require __DIR__.'/auth.php';
