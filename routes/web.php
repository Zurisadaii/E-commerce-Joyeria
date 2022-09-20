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

// Route::get('/ver-catalogo', 'CreateCatalogoController@verCatalogo');
//Route::get('/registro', 'CreateCatalogoController@verRegistro');
// Route::get('/agregar-producto', 'CreateCatalogoController@verAddProd');
// Route::post('/guardaProducto', 'CreateCatalogoController@guardaProducto');
// Route::get('/editar/{id}', 'CreateCatalogoController@editar');
// Route::get('/eliminar/{id}', 'CreateCatalogoController@eliminar');
// Route::get('/reestablecer/{id}', 'CreateCatalogoController@reestablecer');
// Route::get('/ver-catalogo', 'CreateCatalogoController@verCatalogo');
Route::get('/cart', 'CreateViewCatalogoController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'CreateViewCatalogoController@addToCart')->name('add.to.cart');
Route::patch('update-cart', 'CreateViewCatalogoController@update')->name('update.cart');
Route::delete('/remove-form-cart', 'CreateViewCatalogoController@remove')->name('remove.from.cart');
Route::get('/productos', 'CreateViewCatalogoController@verProductos');
Route::get('/productosG', 'GuestController@verProductos');

Route::get('/productos/{tipo}', 'GuestController@verProductosTipo');
Route::get('/productos/', 'CreateViewCatalogoController@buscarProductos')->name('search');
Route::get('/pedido','CreatePedidosController@Pedido');
Route::post('/hacerPedido','CreatePedidosController@realizarPedido');
Route::get('/pedidos', 'CreatePedidosController@verPedidos');
Route::get('/detallesPedido/{id}', 'CreateDetallesPedidosController@viewDetalles');
Route::delete('/olvidar', 'CreateViewCatalogoController@clearCarrito')->name('clearCarrito.from.cart');
Route::get('/producto/{id}', 'CreateViewCatalogoController@producto');
Route::get('/contacto', function () {
    return view('contacto');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
