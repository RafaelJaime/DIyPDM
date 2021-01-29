<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
Route::post('logout', 'API\RegisterController@logout');
// Devuelve articulos
Route::resource('articles', 'API\ArticleController');
// Debes estar logueado
Route::middleware('auth:api')->group( function () {
    Route::resource('offers', 'API\OfferController');
    Route::resource('applieds', 'API\ApliedController');
    Route::resource('cicles', 'API\CycleController');
    Route::resource('users', 'API\UserController');
});