<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassifiedsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SectorController;

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

Route::get('/classifieds', [ClassifiedsController::class, 'GetClassifieds']);
Route::get('/locations', [LocationController::class, 'GetLocations']);
Route::get('/categories', [CategoryController::class, 'GetCategories']);
Route::get('/sectors', [SectorController::class, 'GetSectors']);