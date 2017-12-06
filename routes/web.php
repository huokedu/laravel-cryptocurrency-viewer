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

Route::get('/home', 'HomeController@index');
Route::get('/home/test', 'HomeController@test');

Route::get('/bittrex', 'BittrexController@index');
Route::get('/bittrex/getmarketsummaries', 'BittrexController@getAllCoinInfo');
Route::get('/bittrex/tradingview/{marketName}', 'BittrexController@showTradingView');

Route::get('/poloniex', 'PoloniexController@index');
Route::get('/poloniex/tradingview/{marketName}', 'PoloniexController@showTradingView');

Auth::routes();
