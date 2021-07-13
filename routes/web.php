<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('login');
// });


Route::get('/','App\Http\Controllers\ArticleController@welconmadd');

Route::post('/home','App\Http\Controllers\ArticleController@store');
Route::delete('/home','App\Http\Controllers\ArticleController@destroy');
Route::put('/home','App\Http\Controllers\ArticleController@update');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home','App\Http\Controllers\ArticleController@add');
Route::get('/{article}/edit','App\Http\Controllers\ArticleController@edit')->name('edit');

