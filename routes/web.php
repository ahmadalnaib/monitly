<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteStoreController;
use App\Http\Controllers\EndpointStoreController;
use App\Http\Controllers\EndpointDestroyController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard/{site?}', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/sites', SiteStoreController::class)->middleware(['auth', 'verified'])->name('sites.store');
Route::post('/sites/{site}/endpoint', EndpointStoreController::class)->middleware(['auth', 'verified'])->name('endpoint.store');

Route::delete('/endpoints/{endpoint}', EndpointDestroyController::class)->middleware(['auth', 'verified'])->name('endpoint.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
