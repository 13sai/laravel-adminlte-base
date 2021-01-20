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

Route::group([
    'prefix' => 'v1/',
    'namespace' => 'Api'
], function() {
    Route::get('classification', 'GoodsController@classification');
    Route::get('goods/detail/{id}', 'GoodsController@detail');
    Route::get('index', 'GoodsController@index');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Api'

], function ($router) {

    Route::get('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'jwt.auth',
    'namespace' => 'Api'

], function ($router) {

    // Route::get('me', 'AuthController@me');

});