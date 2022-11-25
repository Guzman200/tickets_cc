<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Models\TipoFormulario;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/get-data-chart/dashboard', [HomeController::class, 'getDataChartDashboard']);

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/usuarios', function(){
            return view('users');
        })->name('users');

        Route::get('/crear/usuario', function(){
            return view('crear_usuario');
        })->name('users.create');

        Route::get('/editar/usuario/{usuario}', function(User $usuario){
            return view('editar_usuario', compact('usuario'));
        })->name('users.edit');
    

    });

    
    Route::group(['middleware' => 'cliente'], function () {


        Route::get('/seleccion-formulario', [TicketController::class, 'selectTipoFormulario'])->name('ticket.seleccion_formulario');


        Route::get('/crear-ticket/{tipoFormulario}', [TicketController::class, 'crear'])->name('ticket.crear');

    });
   
    Route::get('/tickets', function(){
        return view('tickets');
    })->name('tickets');

    Route::get('/ver-descripcion-ticket/{ticket}',[TicketController::class,"verDescripcion"])->name('ver_descripcion');
    
});
