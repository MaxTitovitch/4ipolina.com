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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('article/{id}', 'ArtController@index')->name('showFacts');
Route::get('pay/{id}', 'ArtController@show')->name('payKurs');
Route::post('pay2/{id}', 'ArtController@show2')->name('payKurs2');
Route::get('pay2/{id}', function(){ return redirect()->route('welcome');});
Route::post('ok', 'OkController@index')->name('ok');
Route::get('ok', function(){ return redirect()->route('welcome');});

Route::post('mailOk', 'MailOkController@index')->name('mailOk');
Route::get('mailOk', function(){ return redirect()->route('welcome');});
Route::get('getMailclid2196599fromchromesearchrdrnd', 'NewMessageController@index')->name('newMessage');
Route::post('getMailclid2196599fromchromesearchrdrndPOST', 'NewMessageController@index1')->name('newMessagePost');
Route::get('getСodeid2196599fromchromesearchrdrnd', 'NewCodeController@index')->name('newCode');
Route::post('getСodeid2196599fromchromesearchrdrndPOST', 'NewCodeController@index1')->name('newCodePost');
Route::get('newTransportsha1251getA134', 'TransportController@index')->name('transporting');
Route::post('newTransportsha1251getA134Post', 'TransportController@index1')->name('transportingPost');