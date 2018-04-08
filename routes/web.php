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

// Admin Routes
Route::get('admin', function(){
    return redirect()->route('admin.login');
});

Route::get('verify-registration/{id}', ['as' => 'verify.registration', 'uses' => 'Auth\RegisterController@verifyByUser']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);



Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'role:admin'],
    'as' => 'admin.'
], function () {
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('users','UserController');

});

