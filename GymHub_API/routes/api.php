<?php

use App\Http\Controllers\AccesoTrabadorController;
use App\Http\Controllers\ClaseConClienteController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ClasesGrupalesController;
use App\Http\Controllers\ClienteAsistenciasController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteTrabajadorController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EntrenadorClienteController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\EntrenadorTipoEjercicioController;
use App\Http\Controllers\GymOwnerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RegistroAsistenciasController;
use App\Http\Controllers\TipoEjercicioController;
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
 Route::apiResource('trabajador', TrabajadorController::class); // verificar si no se usa mas

 // API del acceso de trabajador
 Route::apiResource('acceso-trabajador', AccesoTrabadorController::class);

 // Post al API de acceso trabajador para el login de usuario
Route::middleware('api')->group(function () {
    Route::post('/acceso-trabajador/login', [loginController::class, 'accesoTrabajador']);
});

// API de las astistencias de los clientes
Route::apiResource('cliente/get/asistencias', ClienteAsistenciasController::class);

//Post al API de las asistencias de los clientes
Route::middleware('api')->group(function () {
    Route::post('/cliente/post/asistencias', [RegistroAsistenciasController::class, 'registrarAsistenciaCliente']);
});

// API de los clientes
Route::apiResource('cliente/get/all', ClienteController::class);

// API de las clases
Route::apiResource('clase/get/all', ClaseController::class);
Route::get('clase/get/{id}', [ClaseController::class, 'show']);

//API del trabajador 
Route::apiResource('trabajador/get/all', TrabajadorController::class);
Route::get('trabajador/get/{id}', [TrabajadorController::class, 'show']);

//API del entrenador
Route::apiResource('entrenador/get/all', EntrenadorController::class);
Route::get('entrenador/get/{id}', [EntrenadorController::class, 'show']);

//API de las clases grupales
Route::apiResource('clases-grupales/get/all', ClasesGrupalesController::class);

//API de las clases con clientes
Route::apiResource('clase-clientes/get/all', ClaseConClienteController::class);

//API del cliente trabajador
Route::apiResource('cliente-trabajador/get/all', ClienteTrabajadorController::class);

//API del contrato
Route::apiResource('contrato/get/all', ContratoController::class);

//API del entrenador y su agenda
Route::apiResource('entrenador-agenda/get/all', EntrenadorController::class);

//Api del entrenador y cliente
Route::apiResource('entrenador-cliente/get/all', EntrenadorClienteController::class);

//API del entrenador y tipo de ejercicio
Route::apiResource('entrenador-tipo-ejercicio/get/all', EntrenadorTipoEjercicioController::class);

//API del pago
Route::apiResource('pago/get/all', PagoController::class);

//API del tipo de cliente
Route::apiResource('cliente-tipo/get/all', ClienteController::class);

//API de tipos de ejercicios
Route::apiResource('tipo-ejercicio/get/all', TipoEjercicioController::class);

