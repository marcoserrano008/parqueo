<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EspacioController;
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

Route::get('vehiculos',[VehiculoController::class, 'index']);
Route::get('espacios',[EspacioController::class, 'index']);
Route::get('estado',[EspacioController::class, 'estadoParqueo']);
Route::get('lista/espacios',[EspacioController::class, 'listaEspacios']);
Route::get('espacio/{id}',[EspacioController::class, 'estadoEspacio']);
