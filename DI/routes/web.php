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

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

// Rutas login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Tema home
Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Tema usuarios
    Route::get('/users', 'UserController@index');
    Route::get('/users', 'UserController@index');
    Route::post('/users/{id}', 'UserController@update');
    // Tema correos electrónicos
    Route::get('enviarEmail', 'emailController@index')->name('enviarEmail');
    Route::get('envio', 'emailController@envio')->name('envioEmail');
    Route::get('completeEmail', 'emailController@complete')->name('completeEmail');
    // Tema pdfs
    Route::get('pdf', 'InformesController@index')->name('pdf');
    Route::get('pdfb', 'InformesController@users')->name('pdfb');

    // Ofertas por curso
    Route::get('OffersByYear', 'InformesController@Offers');
    Route::get('pdfOffer', 'InformesController@GeneratePDFOffers');

    // Alumnos por ofertas
    Route::get('UsersByOffer', 'InformesController@UsersByOffers');
    Route::get('OffersByCycle', 'InformesController@OffersByCycle');
    Route::get('pdfUser', 'InformesController@GeneratePDFUsers');
});
