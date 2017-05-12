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

Route::post("lotteries/confirm","LotteryController@confirm");
Route::post("lotteries/purchase","LotteryController@purchase");
Route::resource("lotteries","LotteryController");

Route::resource("prizes","PrizeController");
Route::resource("grades","GradeController");
Route::resource("lottery_specs","LotterySpecController");
Route::resource("skus","SkuController");
