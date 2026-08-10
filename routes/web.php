<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkillRequestController;
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware('admin')->group(function () {

        Route::resource('categories', CategoryController::class);

    });

    Route::resource('skills', SkillController::class);
// Skill Requests

// Requests received by the logged-in user
Route::get('/requests', [SkillRequestController::class, 'index'])
    ->name('requests.index');

// Requests sent by the logged-in user
Route::get('/my-requests', [SkillRequestController::class, 'myRequests'])
    ->name('requests.my');

// Send request for a skill
Route::post('/skills/{skill}/request', [SkillRequestController::class, 'store'])
    ->name('requests.store');

// Accept request
Route::patch('/requests/{skillRequest}/accept', [SkillRequestController::class, 'accept'])
    ->name('requests.accept');

// Reject request
Route::patch('/requests/{skillRequest}/reject', [SkillRequestController::class, 'reject'])
    ->name('requests.reject');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';