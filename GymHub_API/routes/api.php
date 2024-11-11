<?php

use App\Http\Controllers\AccesoTrabadorController;
use App\Http\Controllers\GymOwnerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TrabajadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/gym-owner', function (Request $request){
//      return response()->json('EVC Calistenia');
// });
// eso equivale a esta nueva nomenclatura ->

// API del gym owner 
Route::apiResource('gym-owner', GymOwnerController::class);

// Post al API gym owner para el login
Route::middleware('api')->group(function () {
     Route::post('/gym-owner/login', [loginController::class, 'gymOwner']);
 });

// API del trabajador
 Route::apiResource('trabajador', TrabajadorController::class);

 // API del acceso de trabajador
 Route::apiResource('acceso-trabajador', AccesoTrabadorController::class);

 // Post al API de acceso trabajador para el login de usuario
Route::middleware('api')->group(function () {
    Route::post('/acceso-trabajador/login', [loginController::class, 'accesoTrabajador']);
});
