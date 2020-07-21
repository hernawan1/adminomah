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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//TUKANGCUKUR
Route::post('updatetukang', "ApiController@updatetukang");
Route::post('logintukang', "ApiController@logintukang");
Route::post('editprofiletukang', "ApiController@editprofiletukang");

//CUSTOMER
Route::post('daftaruser', "ApiController@createuser");
Route::post('logingoogle', "ApiController@googlecustomer");
Route::post('loginemail', "ApiController@emailcustomer");
Route::post('editprofilecustomer', "ApiController@editprofilecustomer");

//MODELRAMBUT
Route::get('modelrambut',"ApiController@modelrambut");
Route::post('detailrambut', "ApiController@detailmodel");
Route::get('moremodel', "ApiCotroller@moremodel");

//PROMO
Route::get('promo', "ApiController@promo");

//TRANSAKSI
Route::post('transaksi', "ApiController@transaksi");