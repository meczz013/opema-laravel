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

Route::get('/', function () {
    return view('welcome');

});

Route::get('blog', 'App\Http\Controllers\BlogController@index');
Route::get('blog/create', 'App\Http\Controllers\BlogController@create');
Route::post('blog', 'App\Http\Controllers\BlogController@store');
Route::get('blog/show/{id}', 'App\Http\Controllers\BlogController@show');
Route::get('blog/edit/{id}', 'App\Http\Controllers\BlogController@edit');
Route::patch('blog/update/{id}', 'App\Http\Controllers\BlogController@update');
Route::delete('blog/destroy/{id}', 'App\Http\Controllers\BlogController@destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
