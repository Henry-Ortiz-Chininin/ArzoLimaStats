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

Route::get('/parroquia/{parroquiaId}/miembro/{miembroId}/desactivar', 'ParroquiaController@desactivarmiembro')->middleware(['auth'])->name('parroquia.miembros.desactivar');

Route::get('/parroquia', 'ParroquiaController@nuevo')->middleware(['auth'])->name('parroquia.nuevo');
Route::post('/parroquia', 'ParroquiaController@agregar')->middleware(['auth'])->name('parroquia.nuevo');

Route::get('/parroquia/{codigo}', 'ParroquiaController@editar')->middleware(['auth'])->name('parroquia.editar');
Route::post('/parroquia/{codigo}', 'ParroquiaController@actualizar')->middleware(['auth'])->name('parroquia.editar');

//CAPILLAS
Route::get('/parroquia/{parroquia}/capillas', 'CapillaController@index')->middleware(['auth'])->name('capillas');
Route::get('/parroquia/{parroquia}/capillas/nuevo', 'CapillaController@nuevo')->middleware(['auth'])->name('capillas.nuevo');
Route::get('/parroquia/{parroquia}/capilla/{capilla}', 'CapillaController@editar')->middleware(['auth'])->name('capilla.editar');
Route::post('/parroquia/{parroquia}/capilla/guardar', 'CapillaController@guardar')->middleware(['auth'])->name('capilla.guardar');

//COLEGIOS
Route::get('/parroquia/{parroquia}/colegios', 'ColegioController@parroquia')->middleware(['auth'])->name('colegios.parroquia');
Route::get('/parroquia/{parroquia}/colegio/nuevo', 'ColegioController@nuevo')->middleware(['auth'])->name('colegio.nuevo');
Route::get('/parroquia/{parroquia}/colegio/{colegio}', 'ColegioController@editar')->middleware(['auth'])->name('colegio.editar');
Route::post('/parroquia/{parroquia}/colegio/guardar', 'ColegioController@guardar')->middleware(['auth'])->name('colegio.guardar');

//OBRAS
Route::get('/parroquia/{parroquia}/obras', 'ObraController@parroquia')->middleware(['auth'])->name('obras.parroquia');
Route::get('/parroquia/{parroquia}/obra/nuevo', 'ObraController@parroquianuevo')->middleware(['auth'])->name('obra.parroquia.nuevo');
Route::get('/parroquia/{parroquia}/obra/{obra}', 'ObraController@parroquiaeditar')->middleware(['auth'])->name('obra.parroquia.editar');
Route::post('/parroquia/{parroquia}/obra/guardar', 'ObraController@parroquiaguardar')->middleware(['auth'])->name('obra.parroquia.guardar');

//SACRAMENTOS
Route::get('/parroquia/{parroquia}/sacramentos', 'SacramentoController@index')->middleware(['auth'])->name('sacramentos');
Route::get('/parroquia/{parroquia}/sacramento/nuevo', 'SacramentoController@nuevo')->middleware(['auth'])->name('sacramento.nuevo');
Route::get('/parroquia/{parroquia}/sacramento/{sacano}', 'SacramentoController@editar')->middleware(['auth'])->name('sacramento.editar');
Route::post('/parroquia/{parroquia}/sacramento/guardar', 'SacramentoController@guardar')->middleware(['auth'])->name('sacramento.guardar');

//CASAS
Route::get('/parroquia/{parroquia}/casas', 'CasaController@parroquia')->middleware(['auth'])->name('casas.parroquia');
Route::get('/parroquia/{parroquia}/casa/nuevo', 'CasaController@parroquianuevo')->middleware(['auth'])->name('casa.parroquia.nuevo');
Route::get('/parroquia/{parroquia}/casa/{casa}', 'CasaController@parroquiaeditar')->middleware(['auth'])->name('casa.parroquia.editar');
Route::post('/parroquia/{parroquia}/casa/guardar', 'CasaController@parroquiaguardar')->middleware(['auth'])->name('casa.parroquia.guardar');

//CATEQUISTA
Route::get('/parroquia/{parroquia}/catequistas', 'CatequistaController@index')->middleware(['auth'])->name('catequistas');
Route::get('/parroquia/{parroquia}/catequista/nuevo', 'CatequistaController@nuevo')->middleware(['auth'])->name('catequista.nuevo');
Route::get('/parroquia/{parroquia}/catequista/{capilla}', 'CatequistaController@editar')->middleware(['auth'])->name('catequista.editar');
Route::post('/parroquia/{parroquia}/catequista/guardar', 'CatequistaController@guardar')->middleware(['auth'])->name('catequista.guardar');

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