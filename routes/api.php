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

Route::resource('quan-tri', 'UsersController');
Route::resource('danh-muc', 'CategoriesController');
Route::post('sua-danh-muc/{id}', 'CategoriesController@update');

Route::resource('san-pham', 'ProductsController');
Route::get('xem-san-pham/{id}', 'ProductsController@show');
Route::post('sua-san-pham/{id}', 'ProductsController@update');
Route::post('SaveFile', 'ProductsController@saveFile');