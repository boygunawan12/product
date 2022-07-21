<?php

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

//display data
Route::get('/product', 'ProductController@index');

//create product
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');

//edit product
Route::get('/product/edit/{id}', 'ProductController@edit');
Route::post('/product/edit/update/{id}', 'ProductController@update');

//destroy product
Route::get('/product/delete/{id}', 'ProductController@destroy');
