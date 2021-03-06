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

Route::get('downloads/{file}','ExtinguidorController@download')->name('downloads');
Route::middleware(['auth'] )->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@index1')->name('profile');
    Route::get('/generateQR/{id}', 'ExtinguidorController@generateQR')->name('generateQR');

    Route::resource('categorias', 'CategoriaController');
    Route::resource('sub-categorias', 'SubCategoriaController');
    Route::resource('plantas', 'PlantaController');
    Route::resource('extintor', 'ExtinguidorController');
    Route::resource('asignacion', 'AsignacionController');
    Route::resource('itms', 'ItemController');
    Route::resource('asignacionTrabajador', 'AsignacionTrabajadorController');
    Route::resource('informe', 'InformeController');
    Route::resource('user', 'UserController');
    
    Route::get('viewRegisUser','UserController@viewRegisUser')->name('user.viewRegisUser'); 


    Route::get('/ReportePDF-Extinguidores/{id}', 'PDFController@PDFExtinguidor')->name('ReporteExtinguidor');

});