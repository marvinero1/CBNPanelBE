<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExtinguidorController;
use App\Http\Controllers\InformeController;
use App\Extinguidor;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('actualizarExtinguidor/{id}', [ExtinguidorController::class,'actualizarExtinguidor']);  
Route::get('/getExtinguidor/{id}',[ExtinguidorController::class, 'getExtinguidor']);

Route::get('/getExtinguidorAll',[ExtinguidorController::class, 'getExtinguidorAll']);
Route::get('/getInforme',[InformeController::class, 'getInforme']);