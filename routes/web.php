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
    return view('welcome');
});

Auth::routes();

Route::resource('consultas', App\Http\Controllers\ConsultaController::class);
Route::resource('inscripciones', App\Http\Controllers\InscripcioneController::class);
Route::resource('materias', App\Http\Controllers\MateriaController::class);
Route::resource('users', App\Http\Controllers\UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
