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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('pdf', 'InformesController@index')->name('pdf');
Route::get('pdfb', 'InformesController@users')->name('pdfb');
Route::get('pdf1', 'InformesController@pagina1');
Route::get('pdf2', 'InformesController@pagina2');
Route::get('pdf2/{id}', 'InformesController@mostrarOfertas');
Route::get('pdfb', 'InformesController@general')->name('pdfa');

Route::get('/users', 'UserController@index');