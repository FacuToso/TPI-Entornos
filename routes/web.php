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
    return view('home');
});

Auth::routes();

Route::resource('consultas', App\Http\Controllers\ConsultaController::class)->middleware('auth');
Route::resource('inscripciones', App\Http\Controllers\InscripcioneController::class)->middleware('auth');
Route::resource('materias', App\Http\Controllers\MateriaController::class)->middleware('auth');
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/all', [App\Http\Controllers\ConsultaController::class, 'all'])->name('all')->middleware('auth');
// Route::get('/inscrib', 'App\Http\Controllers\InscripcioneController@createAlum')->name('inscrib');
Route::get('/inscrib/{id}','App\Http\Controllers\InscripcioneController@createAlum')->name('inscrib')->middleware('auth');
Route::get('/misinscripciones/{id}','App\Http\Controllers\InscripcioneController@misInscripciones')->name('misinscripciones')->middleware('auth');
Route::get('/misconsultas/{id}','App\Http\Controllers\ConsultaController@misConsultas')->name('misconsultas')->middleware('auth');
Route::get('/createmiconsulta/{id}','App\Http\Controllers\ConsultaController@createMiConsulta')->name('createmiconsulta')->middleware('auth');
