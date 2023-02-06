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


Route::resource('alquiler/vehiculos',  'App\Http\Controllers\VehiculosController');
Route::resource('alquiler/marcas',  'App\Http\Controllers\MarcasController');


Route::resource('alquiler/ingreso',  'App\Http\Controllers\IngresoController');

Route::resource('alquiler/marca',  'App\Http\Controllers\MarcaController');
Route::resource('alquiler/vehiculo',  'App\Http\Controllers\VehiculoController');
Route::resource('alquiler/mecanico',  'App\Http\Controllers\MecanicoController');
Route::resource('alquiler/ventas',  'App\Http\Controllers\ClienteController');
//Route::get('/alquiler/marca', 'App\Http\Controllers\MarcaController@index');
//Route::get('/alquiler/marca/create', 'App\Http\Controllers\MarcaController@create');