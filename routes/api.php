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

Route::post('vote', 'APIWebController@vote');
Route::post('password', 'APIWebController@password');
Route::post('click', 'APIWebController@click');
Route::post('buscar', 'APIWebController@buscar');
Route::post('uploadImage', 'APIWebController@uploadImage');
