<?php

use App\Exports\ProductoExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::resource('clientes','ClienteController');
Route::resource('productos','ProductoController');
Route::resource('facturas','FacturaController');

Route::get('exportcliente/{tipo}','ClienteController@export');
Route::get('exportproductos/{tipo}','ProductoController@export');
Route::get('exportfacturas/{tipo}','FacturaController@export');
