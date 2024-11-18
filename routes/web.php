<?php

use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('properties', PropertyController::class);

    Route::delete('property-images/{propertyImage}', [PropertyController::class, 'deleteImage'])
    ->name('admin.property-images.destroy');
});

Route::get('/dashboard1', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('properties', PropertyController::class);
    
// Optional: Add a route for deleting individual property images


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
