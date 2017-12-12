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

Route::resource('posts', 'PostsController');


// //muestra todos los posteos
// Route::get('posts','PostsController@index');
//
// //muestra formulario de carga de posteos-solo visible por admin y superadmin
// Route::get('posts/create','PostsController@create');
//
// //carga lo completado en el formulario de arriba-solo visible por admin y superadmin
// Route::post('posts/store','PostsController@store');
//
// //muestra la imagen seleccionada
// Route::get('posts/show/{id}','PostsController@show');
//
// //muestra formulario de modificacion de imagen -solo visible por admin y superadmin
// Route::get('posts/edit/{id}','PostsController@edit');
//
// //updatea las modificaciones hechas arriba en la db -solo visible por admin y superadmin
// Route::post('posts/update/{id}','PostsController@update');
//
// //elimina la imagen seleccionada -solo visible por admin y superadmin
// Route::post('posts/destroy/{id}','PostsController@destroy');
