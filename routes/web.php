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

Route::get('login', 'UserController@login')->name('login');
Route::post('register', 'UserController@create')->name('create');
Route::post('postlogin', 'UserController@postlogin')->name('postlogin');
Route::get('logout', 'UserController@logout')->name('logout');

Route::group(['middleware' => ['auth','CheckRole:Admin']], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('tukangcukur', 'HomeController@tukangcukur')->name('tukangcukur');
    Route::get('promo', 'HomeController@promo')->name('promo');
    Route::get('modelrambut', 'HomeController@modelrambut')->name('modelrambut');
    Route::get('hargapotong', 'HomeController@hargapotong')->name('hargapotong');
    Route::get('customer', 'HomeController@customer')->name('customer');

    //CREATE
    Route::post('/createpromo','CrudController@promo')->name('createpromo');
    Route::post('/createmodel', 'CrudController@model')->name('createmodel');
    Route::post('/createharga', 'CrudController@harga')->name('createharga');
    Route::post('/createtukangcukur', 'CrudController@daftartukang')->name('createtukangcukur');

    //UPDATE
    Route::post('model/{id}', 'CrudController@updatemodel')->name('updatemodel');
    Route::post('harga/{id}', 'CrudController@updateharga')->name('updateharga');

    //DELETE
    Route::get('promo/{id}', 'CrudController@delete')->name('deletepromo');
});
