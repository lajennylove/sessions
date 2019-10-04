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



//Auth::routes();



Route::get('/registro', 'PageController@login');
Route::get('/unperfiluser', 'PageController@profileuserexample');
Route::get('/orederByVotes', 'BandController@orederByVotes');
Route::get('/registro/user', 'PageController@registerView');
Route::get('/login', 'PageController@loginView');
Route::post('/log_in/user', 'PageController@loginPost');
Route::get('/', 'PageController@index');
Route::get('/comoparticipar', 'PageController@comoparticipar');
Route::get('/bandas', 'PageController@bandas');
Route::post('/bandas/buscar', 'PageController@findBandas');
Route::get('/generos/{gender}', 'PageController@generos');
Route::get('/tyc', 'PageController@bases');
Route::get('/logout', 'PageController@logout');
Route::post('/registro', 'PageController@register');
Route::post('/registro/user', 'PageController@registerUser');
Route::get('/profile/band', 'PageController@profileView');
Route::get('/band/{username}', 'PageController@band');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:band']], function () {
        Route::get('/profile_band', 'PageController@profileBand');
        Route::get('/profile_band/edit/{username}', 'PageController@edit');
        Route::post('/profile_band/edit/{username}', 'PageController@update');
    });
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/profile_user', 'PageController@profileUser');
    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin', 'BandController@index');
        Route::get('/admin/byVotes', 'BandController@orederByVotes');
        Route::get('/admin/byClicks', 'BandController@orederByClicks');
        Route::get('/admin/download', 'BandController@download');
        Route::get('/admin/band/{band_id}', 'BandController@show');
        Route::get('/admin/edit/{band_id}', 'BandController@edit');
        Route::post('/admin/band/{band_id}', 'BandController@update');
    });
    
});
//Route::get('admin', 'Admin\AdminController@index');
//Route::resource('admin/roles', 'Admin\RolesController');
//Route::resource('admin/permissions', 'Admin\PermissionsController');
//Route::resource('admin/users', 'Admin\UsersController');
//Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
//Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

//route for login con facebook
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');