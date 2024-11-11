<?php

use App\Http\Controllers\WineController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::resource('wine', WineController::class);
Route::resource('wines', WineController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
