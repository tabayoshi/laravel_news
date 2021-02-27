<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Article -------------------------------------------
Route::get('/', 'ArticleController@index');
Route::post('/', 'ArticleController@store');

//Comment -------------------------------------------
Route::get('/comment', 'CommentController@comment');
Route::post('/comment', 'CommentController@store');
// Route::post('/comment', 'CommentController@delete');
// Route::get('/comment/{id}', 'CommentController@destroy');


