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


Route::get('/parroquia', 'ParroquiaController@index')->middleware(['auth'])->name('parroquia');
Route::get('/parroquia', 'ParroquiaController@search')->middleware(['auth'])->name('parroquia.search');
Route::get('/parroquia/{codigo}', 'ParroquiaController@editar')->middleware(['auth'])->name('parroquia.editar');
Route::get('/parroquia/nuevo', 'ParroquiaController@nuevo')->middleware(['auth'])->name('parroquia.nuevo');


require __DIR__.'/auth.php';

// -------------------------------------------------------------------------
// --------------------  ZONA ADMINISTRACION
// -------------------------------------------------------------------------

// -- panel de administrador
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});