<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::middleware(['auth'] )->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@index1')->name('profile');
    Route::get('/generateQR/{id}', 'ExtinguidorController@generateQR')->name('generateQR');

    Route::resource('categorias', 'CategoriaController');
    Route::resource('sub-categorias', 'SubCategoriaController');
    Route::resource('plantas', 'PlantaController');
    Route::resource('extintor', 'ExtinguidorController');
    Route::resource('itms', 'ItemController');
    Route::resource('usuario', 'UserController');

});