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
// Auth::routes();
// Route::get('/', 'HomeController@index');

Route::get('/',[ 'as' => 'IntroPage', 'uses' => 'IntroduceController@IntroPage']);

Route::group(['prefix' => 'user'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('login',[ 'as' => 'login', 'uses' => 'UserAuthController@LoginPage']);
		Route::post('login',[ 'as' => 'LoginProcess', 'uses' => 'UserAuthController@LoginProcess']);
        Route::get('logout',[ 'as' => 'LogoutProcess', 'uses' => 'UserAuthController@LogoutProcess']);
    });
});
 
Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard',[ 'as' => 'dashboard', 'uses' => 'DashboardController@dashboardPage']);

	Route::get('books', 'Admin\CrawlerController@test');
	Route::get('ReadTc', 'Admin\CrawlerReadTcController@MainPage');
	Route::get('search', 'Admin\CrawlerController@searchBooksUrl');

	Route::group(['namespace'=>'Common'], function () {
		Route::get('textUpload', [ 'as' => 'textUpload', 'uses' => 'TextController@textUploadPage']);
		Route::get('textImport', [ 'as' => 'textImport', 'uses' => 'TextController@textImportingPage']);
		Route::get('textAnalysisResult', [ 'as' => 'textAnalysisResult', 'uses' => 'TextController@textAnalysisResult']);
		Route::post('textImportProcess', [ 'as' => 'textImportProcess', 'uses' => 'TextController@textImportProcess']);
		Route::post('textUploadProcess', [ 'as' => 'textUploadProcess', 'uses' => 'TextController@textUploadProcess']);

		Route::get('BooksSearch', [ 'as' => 'BooksSearch', 'uses' => 'BooksSearchController@BooksSearchPage']);
		Route::get('BooksSearch/fetch_data', [ 'as' => 'BooksQuery', 'uses' => 'BooksSearchController@BooksQueryProcess']);
	});
});

//任意輸入網址錯誤
// Route::any('{any}', 'IntroduceController@ErrorPageRedirect');
