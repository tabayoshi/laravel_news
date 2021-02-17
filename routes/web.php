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

//localhost:8888に接続するとArticleControllerのindexアクションを実行する
Route::get('/', 'ArticleController@index');
Route::post('/store', 'ArticleController@store');

//localhost:8888/commentに接続するとArticleControllerのcommentアクションを実行する
Route::get('/comment', 'ArticleController@comment');




