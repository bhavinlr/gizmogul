<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::match(['get', 'post'], '/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['role:admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->middleware('permission:dashboard_access')->name('dashboard');

    /* User Management */
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/user/login/{id}', 'UserController@userLogin')->name('user.login');
    Route::get('/user/logout/', 'UserController@userLogout')->name('user.logout');

    /* Location Management */
    Route::get('/location', 'LocationController@index')->name('location.index');
    Route::get('/location/edit/{id?}/', 'LocationController@edit')->name('location.edit');
    Route::post('/location/store/{id?}', 'LocationController@store')->name('location.store');
    Route::get('/location/show/{id}', 'LocationController@show')->name('location.show');
});

Route::group(['prefix' => 'vendor', 'as' => 'vendor.', 'namespace' => 'App\Http\Controllers\Vendor', 'middleware' => ['role:vendor']], function () {
    Route::get('/dashboard', 'DashboardController@index')->middleware('permission:dashboard_access')->name('dashboard');
});

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\User', 'middleware' => ['role:user']], function () {
    Route::get('/dashboard', 'DashboardController@index')->middleware('permission:dashboard_access')->name('dashboard');
});
