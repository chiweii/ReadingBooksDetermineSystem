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

// Route::get('/', function () {
//     'as' => 'profile', 'uses' => 'Admin\CrawlerController@test'
//     dd('看三小');
//     // return view('welcome');
// });
Route::get('/', 'Admin\CrawlerController@test');


//任意輸入網址錯誤
Route::get('{any}', function ($any) {

  dd('5566');

})->where('any', '.*');
