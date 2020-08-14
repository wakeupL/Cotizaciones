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

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('clientes', 'ClientesController');
Route::get('clientes/{id}/destroy', [
		'uses'	=> 'ClientesController@destroy',
		'as'	=> 'clientes.destroy'
	]);
Route::resource('productos', 'ProductosController');
Route::get('productos/{id}/destroy', [
		'uses'	=> 'ProductosController@destroy',
		'as'	=> 'productos.destroy'
	]);
Route::resource('cotizacion', 'CotizacionController');
Route::resource('alistarProductos', 'ProductosCotizacionController');

Route::post('additem', [
    'uses' => 'ProductosCotizacionController@addItem',
    'as' => 'add.item'
]);

Route::post('getPdf', [
    'uses' => 'ProductosCotizacionController@getPdf',
    'as' => 'getPdf'
]);