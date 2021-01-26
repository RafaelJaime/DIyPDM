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

// Rutas login
Auth::routes();

// Tema home
Route::get('/home', 'HomeController@index')->name('home');

// Tema usuarios
Route::get('/users', 'UserController@index');
Route::get('/users', 'UserController@index');
Route::post('/users/{id}', 'UserController@update');
// Tema correos electrónicos
Route::post('/enviarEmail', 'HomeController@enviarEmail')->name('enviarEmail');
// Tema pedfs
Route::get('pdf', 'InformesController@index')->name('pdf');
Route::get('pdfb', 'InformesController@users')->name('pdfb');

// Ofertas
Route::get('Offers', 'InformesController@Offers');
Route::get('pdfOffer', 'InformesController@GeneratePDFOffers');

Route::get('pdf2', 'InformesController@pagina2');
Route::get('pdf2/{id}', 'InformesController@mostrarOfertas');
Route::get('pdfb', 'InformesController@general')->name('pdfa');