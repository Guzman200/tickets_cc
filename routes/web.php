<?php

use App\Http\Controllers\TicketController;
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

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/usuarios', function(){
        return view('users');
    })->name('users');

    Route::get('/tickets', function(){
        return view('tickets');
    })->name('tickets');

    Route::get('/crear-ticket', function(){
        return view('crear_ticket');
    })->name('crear_ticket');

    Route::get('/ver-descripcion-ticket/{ticket}',[TicketController::class,"verDescripcion"])->name('ver_descripcion');

    Route::post("/crear-ticket",[TicketController::class,"create"])->name('create_ticket');
    
});
