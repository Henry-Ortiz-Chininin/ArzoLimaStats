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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//PARROQUIAS
Route::get('/parroquias', 'ParroquiaController@index')->middleware(['auth'])->name('parroquias');
Route::get('/parroquias', 'ParroquiaController@search')->middleware(['auth'])->name('parroquias.search');

Route::get('/parroquia/{codigo}/miembros/buscar', 'ParroquiaController@buscarmiembro_get')->middleware(['auth'])->name('parroquia.miembros.buscar');
Route::get('/parroquia/{codigo}/miembros/search', 'ParroquiaController@buscarmiembro_post')->middleware(['auth'])->name('parroquia.miembros.search');

Route::get('/parroquia/{codigo}/miembro/{miembro}/nuevo', 'ParroquiaController@nuevomiembro')->middleware(['auth'])->name('parroquia.miembros.nuevo');
Route::post('/parroquia/{codigo}/miembro/{miembro}/agregar', 'ParroquiaController@agregarmiembro')->middleware(['auth'])->name('parroquia.miembros.agregar');

Route::get('/parroquia/{codigo}/miembro/{miembro}/desactivar', 'ParroquiaController@desactivarmiembroform')->middleware(['auth'])->name('parroquia.miembros.desactivar');
Route::post('/parroquia/{codigo}/miembro/{miembro}/desactivar', 'ParroquiaController@desactivarmiembro')->middleware(['auth'])->name('parroquia.miembros.desactivar');

Route::get('/parroquia', 'ParroquiaController@nuevo')->middleware(['auth'])->name('parroquia.nuevo');
Route::post('/parroquia', 'ParroquiaController@agregar')->middleware(['auth'])->name('parroquia.nuevo');

Route::get('/parroquia/{codigo}', 'ParroquiaController@editar')->middleware(['auth'])->name('parroquia.editar');
Route::post('/parroquia/{codigo}', 'ParroquiaController@actualizar')->middleware(['auth'])->name('parroquia.editar');

//CAPILLAS
Route::get('/parroquia/{parroquia}/capillas', 'CapillaController@index')->middleware(['auth'])->name('capillas');

//COLEGIOS
Route::get('/parroquia/{parroquia}/colegios', 'ColegioController@parroquia')->middleware(['auth'])->name('colegios.parroquia');

//OBRAS
Route::get('/parroquia/{parroquia}/obras', 'ObraController@parroquia')->middleware(['auth'])->name('obras.parroquia');

//SACRAMENTOS
Route::get('/parroquia/{parroquia}/sacramentos', 'SacramentoController@index')->middleware(['auth'])->name('sacramentos');

//CASAS
Route::get('/parroquia/{parroquia}/casas', 'CasaController@parroquia')->middleware(['auth'])->name('casas.parroquia');

//CATEQUISTA
Route::get('/parroquia/{parroquia}/catequistas', 'CatequistaController@index')->middleware(['auth'])->name('catequistas');

//HISTORIA
Route::get('/parroquia/{parroquia}/historia', 'HistoriaController@parroquia')->middleware(['auth'])->name('historia.parroquia');





require __DIR__.'/auth.php';

// -------------------------------------------------------------------------
// --------------------  ZONA ADMINISTRACION
// -------------------------------------------------------------------------

// -- panel de administrador
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});