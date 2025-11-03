<?php

use App\Http\Controllers\API\AntrianController;
use App\Http\Controllers\API\LoketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Loket routes
Route::apiResource('lokets', LoketController::class);

// Antrian routes
Route::get('antrians/dipanggil', [AntrianController::class, 'getDipanggil']);
Route::apiResource('antrians', AntrianController::class);