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



Route::get('/ver-catalogo', 'CreateCatalogoController@verCatalogo');
Route::get('/agregar-producto', 'CreateCatalogoController@verAddProd');
Route::post('/guardaProducto', 'CreateCatalogoController@guardaProducto');
Route::get('/editar/{id}', 'CreateCatalogoController@editar');
Route::get('/eliminar/{id}', 'CreateCatalogoController@eliminar');
Route::get('/reestablecer/{id}', 'CreateCatalogoController@reestablecer');
Route::get('/ver-catalogo', 'CreateCatalogoController@verCatalogo');
Route::get('/usuarios', 'UserController@mostrarUsusarios');
Route::get('/hacerAdmin/{id}', 'UserController@hacerAdmin');
Route::get('/quitarAdmin/{id}', 'UserController@quitarAdmin');
Route::get('/ver-catalogo/', 'CreateCatalogoController@buscarProductos')->name('searchAdmin');
Route::get('/pedidosAdmin', 'ViewPedidosController@verPedidos');
Route::get('/autorizado/{id}', 'ViewDetallesPedidosController@autorizadoP');
Route::get('/pPendiente/{id}', 'ViewDetallesPedidosController@pendienteP');
Route::get('/cancelado/{id}', 'ViewDetallesPedidosController@canceladoP');
Route::get('/enviado/{id}', 'ViewDetallesPedidosController@enviadoP');
Route::get('/entregado/{id}', 'ViewDetallesPedidosController@entregadoP');
Route::get('/eliminarUser/{id}', 'UserController@eliminarUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
