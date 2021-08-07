<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'Auth\AuthController@register')->name('register');
Route::post('login', 'Auth\AuthController@login')->name('login');
Route::get('user/me', 'Auth\AuthController@user');

Route::get('users', 'UserController@index')->name('user.index');
Route::get('user/{user}', 'UserController@show')->name('user.show');
Route::put('user/{user}', 'UserController@update')->name('user.update');
Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');