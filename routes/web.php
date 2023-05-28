<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoconferenciaController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //GRUPO DE RUTAS PARA DATATABLES
    Route::controller(DatatableController::class)->group(function(){
        Route::get('datatable/usuarios', 'usuarios')->name('datatable.usuarios'); //GRUPO DE RUTAS PARA CONTROLADORES (RUTA, FUNCION)
        Route::get('datatable/clientes', 'clientes')->name('datatable.clientes');
        Route::get('datatable/estados', 'estados')->name('datatable.estados');
        Route::get('datatable/proyectos', 'proyectos')->name('datatable.proyectos');
        Route::get('datatable/misproyectos', 'misproyectos')->name('datatable.misproyectos');
        Route::get('datatable/proyectosejecucion', 'proyectosejecucion')->name('datatable.proyectosejecucion');
        Route::get('datatable/proyectosterminados', 'proyectosterminados')->name('datatable.proyectosterminados');
    });

    //ROLES
    Route::resource('roles', RoleController::class)->names('roles');

    //USER
    Route::resource('users', UserController::class)->names('users');
    Route::post('userdeleteRequest', [UserController::class, 'destroyid'])->name('userdeleteRequest.post');
    Route::post('reset/{user}', [UserController::class, 'reset'])->name('user.reset');

    //CLIENTES
    Route::resource('clientes', ClienteController::class)->names('clientes');
    Route::post('clienteDeleteRequest', [ClienteController::class, 'destroyid'])->name('clienteDeleteRequest.post');

    //ESTADOS
    Route::resource('estados', EstadosController::class)->names('estados');
    Route::post('estadoDeleteRequest', [EstadosController::class, 'destroyid'])->name('estadoDeleteRequest.post');
    Route::get('estados.showId', [EstadosController::class, 'showId'])->name('estados.showId');

    //PROYECTOS
    Route::resource('proyectos', ProyectoController::class)->names('proyectos');
    Route::post('proyectoDeleteRequest', [ProyectoController::class, 'destroyid'])->name('proyectoDeleteRequest.post');
    Route::get('proyectos.showId', [ProyectoController::class, 'showId'])->name('proyectos.showId');
    Route::get('proyectos.misproyectos', [ProyectoController::class, 'misproyectos'])->name('proyectos.misproyectos');
    Route::get('proyectos.proyectosejecucion', [ProyectoController::class, 'proyectosejecucion'])->name('proyectos.proyectosejecucion');
    Route::get('proyectos.proyectosterminados', [ProyectoController::class, 'proyectosterminados'])->name('proyectos.proyectosterminados');

    //VIDEOCONFERENCIA
    Route::resource('videoconferencias', VideoconferenciaController::class)->names('videoconferencias');
    Route::get('videoconferencias.showId', [VideoconferenciaController::class, 'showId'])->name('videoconferencias.showId');
});
