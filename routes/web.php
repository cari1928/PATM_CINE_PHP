<?php

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

// Grupo de rutas de recursos
Route::resource('almacen/categoria', 'CategoriaController');
Route::resource('almacen/pelicula', 'PeliculaController');
Route::resource('almacen/colaborador', 'ColaboradorController');
Route::resource('almacen/categoria_pelicula', 'CategoriaPeliculaController');
Route::resource('almacen/reparto', 'RepartoController');

Route::resource('ventas/cliente', 'ClienteController');

Route::resource('configuracion/rol', 'RolController');
Route::resource('configuracion/empleado', 'EmpleadoController');
Route::resource('configuracion/sucursal', 'SucursalController');
Route::resource('configuracion/personal', 'PersonalController');
