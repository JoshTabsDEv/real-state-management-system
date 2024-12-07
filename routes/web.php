<?php

use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Livewire\EditProperty;
use App\Livewire\ScheduleAppointment;
use App\Models\AgentApplication;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('main-dashboard');
        Route::post('/agent/approve/{applicationId}', [AgentController::class, 'approveApplication'])->name('agent.approve');

        Route::post('/agent/reject/{applicationId}', [AgentController::class, 'rejectApplication'])->name('agent.reject');

        Route::get('/agent/applications', [AgentController::class, 'showAllApplications'])->name('agent.apply');
        Route::get('/agents', [AgentController::class, 'index'])->name('agent.index');

        Route::get('/properties', [PropertyController::class, 'index'])->name('property.index');
        Route::post('/property/create', [PropertyController::class, 'store'])->name('property.create');
        Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');

        Route::delete('property-images/{propertyImage}', [PropertyController::class, 'deleteImage'])
            ->name('admin.property-images.destroy');

    });

    Route::middleware(['role:agent'])->prefix('agent')->name('agent..')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('main-dashboard');



    });

    Route::middleware(['role:client'])->name('client.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('main-dashboard');
        Route::get('/list', [AgentController::class, 'index'])->name('list');
        Route::get('/apply', [AgentController::class, 'showForm'])->name('apply');
        Route::get('/home', function () {
            return view('user.index');
        })->name('index');

        // Submit the agent application
        Route::post('/apply', [AgentController::class, 'applyToBecomeAgent'])->name('apply.submit');

        // Show application status
        Route::get('/application-status', [AgentController::class, 'showApplicationStatus'])->name('application.status');

    });
});

// Route::get('/home', function () {
//     return view('user.index');
// });

Route::get('/properties/{id}/edit', EditProperty::class)->name('property.edit');
Route::get('/properties/{id}/view', ScheduleAppointment::class)->name('property.edit');




// Optional: Add a route for deleting individual property images


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Show agent application form

});

require __DIR__ . '/auth.php';
