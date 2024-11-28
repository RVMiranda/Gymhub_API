<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ApiProxyController;
use App\Http\Controllers\EntrenadorController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\RegistroAsistenciasController;

// Route::get('/', function () {
//     return view('welcome');
// });

//extensiones para el navegador 

//ruta de prueba
Route::get('/eduardinho', [HomeController::class, 'Eduardo']);


// vista de inicio de sesion para usuarios
Route::get('/home-dashboard', [HomeController::class, 'Home']);

Route::get('/home-login', [HomeController::class, 'HomeLogin']);

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


//vistas
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('administrador.dashboard');
Route::get('/entrenador/dashboard', [EntrenadorController::class, 'dashboard'])->name('entrenador.dashboard');
Route::get('/recepcionista/dashboard', [RecepcionistaController::class, 'dashboard'])->name('recepcionista.dashboard');