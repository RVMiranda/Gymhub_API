<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ApiProxyController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\RegistroAsistenciasController;

// Route::get('/', function () {
//     return view('welcome');
// });

//extensiones para el navegador 

// aqui muestra la vista de login para los gym owner
Route::get('/login', [loginController::class, 'login']);
// ruta para solicitar el login del gym owner
Route::post('/login', [ApiProxyController::class, 'login'])->name('login');

//ruta para el login del admin, usuario y trabajador
Route::post('/login-trabajador', [ApiProxyController::class, 'loginTrabajador'])->name('login-trabajador');

//ruta para registrar asistencia del cliente
Route::post('/cliente/registrar-asistencia', [RegistroAsistenciasController::class, 'registrarAsistenciaCliente'])->name('cliente.registrar.asistencia');

//ruta para obtener mis horarios de clases grupales
Route::get('/horarios/ver-clases', [HorariosController::class, 'horarios'])->name('horarios.horarios');

//ruta para obtener los clientes de los ultimos 3 meses
Route::get('/clientes/nuevos/tres-meses', [ClienteController::class, 'nuevosClientesUltimosTresMeses']);

//ruta para obtener los clientes activos de los ultimos 3 meses
Route::get('clientes/activos/tres-meses', [ContratoController::class, 'obtenerClientesActivosUltimosMeses']);

//ruta para obtener las cancelaciones del ultimo mes
Route::get('clientes/cancelaciones/mes', [ContratoController::class, 'obtenerCancelacionesMes']);

//ruta para obtener las renovaciones del mes
Route::get('clientes/renovaciones/mes', [ContratoController::class, 'obtenerRenovacionesMes']);





//vistas
// vista de inicio de sesion para usuarios
Route::get('/home-dashboard', [HomeController::class, 'Home']);
Route::get('/home-login', [HomeController::class, 'HomeLogin']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('administrador.dashboard');
Route::get('/admin/entrenador', [AdminController::class, 'entrenador'])->name('administrador.entrenador');
Route::get('/entrenador/dashboard', [EntrenadorController::class, 'dashboard'])->name('entrenador.dashboard');
Route::get('/recepcionista/dashboard', [RecepcionistaController::class, 'dashboard'])->name('recepcionista.dashboard');