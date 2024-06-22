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
//wizard
Route::get('/wizard', 'App\Http\Controllers\Controller@wizard')->name('wizard');

//ver
Route::get('/clasificado/ver/{id}', 'App\Http\Controllers\ClassifiedsController@show')->name('classifieds.show');

Route::post('/clasificado/crear', 'App\Http\Controllers\ClassifiedsController@store')->name('classifieds.store');

// pico y placa
Route::get('/util/pico-placa', 'App\Http\Controllers\Controller@picoPlaca')->name('pico-placa');

// bussiness
Route::get('/negocios', 'App\Http\Controllers\BussinessController@index')->name('bussiness.index');
Route::get('/negocios/crear', 'App\Http\Controllers\BussinessController@create')->name('bussiness.create');
Route::post('/negocios/crear', 'App\Http\Controllers\BussinessController@store')->name('bussiness.store');
Route::get('/negocios/ver/{id}', 'App\Http\Controllers\BussinessController@view')->name('bussiness.view');


Route::get('/contacto', function () {    
    return view('components.contact');
})->name('contacto');
