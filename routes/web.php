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

Route::get('/', 'App\Http\Controllers\ListController@show');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/list', 'App\Http\Controllers\ListController@show');

Route::get('/read', 'App\Http\Controllers\ReadController@show')->middleware('count.view');

Route::post('/write', 'App\Http\Controllers\WritingController@write')->middleware('auth'); 

Route::get('/recommend', 'App\Http\Controllers\RecommendController@show');

Route::get('/write', function() {
    return view('write');
})->middleware('auth');

Route::get('/hello', function() {
    return view('hello');
})->middleware('auth');

Route::post('/comment', 'App\Http\Controllers\CommentController@add');

Route::get('/ex', 'App\Http\Controllers\BoardController@show');





