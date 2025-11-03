<?php

use App\Livewire\DisplayAntrian;
use App\Livewire\PasienAntrian;
use App\Livewire\PetugasLoket;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google Login Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Public Routes
Route::get('/pasien', PasienAntrian::class)->name('pasien');
Route::get('/display', DisplayAntrian::class)->name('display');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/petugas', PetugasLoket::class)->name('petugas');
});
