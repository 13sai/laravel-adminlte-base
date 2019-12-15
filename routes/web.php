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

Route::get('/test', 'HomeController@test')->name('test');

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', 'IndexController@index')->name('admin');

    Route::get('/users', 'UserController@index')->name('admin/users');
    Route::any('/user/edit', 'UserController@edit')->name('admin/user/edit');
    Route::any('/user/create', 'UserController@create')->name('admin/user/create');

    Route::get('/roles', 'RbacController@roles')->name('admin/roles');
    Route::any('/role/edit', 'RbacController@roleEdit')->name('admin/role/edit');
    Route::any('/role/create', 'RbacController@roleCreate')->name('admin/role/create');

    Route::get('/permissions', 'RbacController@permissions')->name('admin/permissions');
    Route::any('/permission/edit', 'RbacController@permissionEdit')->name('admin/permission/edit');
    Route::any('/permission/create', 'RbacController@permissionCreate')->name('admin/permission/create');
    Route::any('/access', 'RbacController@access')->name('admin/access');
});