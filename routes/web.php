<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/







Route::get('/', 'App\Http\Controllers\ClassifiedsController@index');

Route::get('/clasificado/crear', 'App\Http\Controllers\ClassifiedsController@create');

//ver
Route::get('/clasificado/ver/{id}', 'App\Http\Controllers\ClassifiedsController@show')->name('classifieds.show');

Route::post('/clasificado/crear', 'App\Http\Controllers\ClassifiedsController@store')->name('classifieds.store');

Route::get('/contacto', function () {    
    return view('components.contact');
})->name('contacto');
