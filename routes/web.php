<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');
// Route::get('/', [HomeController::class, 'index']);

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');
Route::get('/skills', [SkillController::class, 'index'])
    ->name('skills.index');

Route::get('/skills/create', [SkillController::class, 'create'])
    ->name('skills.create');

    Route::post('/skills', [SkillController::class, 'store'])
    ->name('skills.store');

Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])
    ->name('skills.edit');

Route::put('/skills/{skill}', [SkillController::class, 'update'])
    ->name('skills.update');

Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])
    ->name('skills.destroy');

