<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\AgentApplication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('properties', PropertyController::class);

    Route::get('/appointment', [DashboardController::class,'index1'])->name('appointment.index');

   

    Route::delete('property-images/{propertyImage}', [PropertyController::class, 'deleteImage'])
    ->name('admin.property-images.destroy');

    Route::post('/agent/approve/{applicationId}', [AgentController::class,'approveApplication'])->name('agent.approve');

    Route::post('/agent/reject/{applicationId}', [AgentController::class,'rejectApplication'])->name('agent.reject');

    Route::get('/agent/applications', [AgentController::class,'showAllApplications'])->name('agent.applications');
});



Route::get('/dashboard1', [DashboardController::class, 'index'])->name('admin.dashboard');


    
// Optional: Add a route for deleting individual property images


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Show agent application form
    Route::get('agent/list', [AgentController::class, 'index'])->name('agent.list');
    Route::get('agent/apply', [AgentController::class, 'showForm'])->name('agent.apply');

    // Submit the agent application
    Route::post('agent/apply', [AgentController::class, 'applyToBecomeAgent'])->name('apply.submit');

    // Show application status
    Route::get('agent/application-status', [AgentController::class, 'showApplicationStatus'])->name('agent.application.status');
});

require __DIR__.'/auth.php';
