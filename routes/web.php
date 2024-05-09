<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileSettingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin;

// Route::get('/', function () {
//     return view('/index');   AdminController   roleChange
// });

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/reports', [AdminController::class, 'reports']);
    Route::post('/listing/{id}/dismiss', [AdminController::class, 'dismiss']);
});

Route::middleware(['auth', 'SuperAdmin'])->group(function () {
    Route::get('/superadmin', [SuperAdminController::class, 'index']);
    Route::get('/superadmin/findUser', [SuperAdminController::class, 'findUser']);
    Route::get('/superadmin/roleChange', [SuperAdminController::class, 'roleChange']);
    Route::delete('/superadmin/userDelete', [SuperAdminController::class, 'userDelete']);
});

// /report/{{ $listing->id }}
Route::get("/listing/{id}", [ListingController::class, "show"]);

Route::get('/filter', [IndexController::class, "filter"]);
//return view('index')
// Route::get('/index', [IndexController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/', [IndexController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile-settings', [ProfileSettingsController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-settings', [ProfileSettingsController::class, 'update'])->name('profile.update');
    Route::delete('/profile-settings', [ProfileSettingsController::class, 'destroy'])->name('profile.destroy');

    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.show');

    Route::get("/create-listing", [ListingController::class, "create"])->middleware("auth");
    Route::post("/create", [ListingController::class, "store"])->middleware("auth");

    
    Route::post("/report/{id}", [ReportController::class, "report"])->middleware("auth");

    
    Route::get("/add", [ListingController::class, "addView"])->middleware("auth");
    
    Route::get("/listing/{id}/edit", [ListingController::class, "edit"])->middleware("auth");
    Route::put("/listing/{id}", [ListingController::class, "update"])->middleware("auth");
    
    Route::delete("/listing/{id}", [ListingController::class, "destroy"])->middleware("auth");


    
});

require __DIR__.'/auth.php';
