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

Route::group(array('prefix' => 'application'), function()
{
    Route::get('/create', 'App\Http\Controllers\Web\ApplicationController@create')->name('application.create');
    Route::post('/store', 'App\Http\Controllers\Web\ApplicationController@store')->name('application.store');
    Route::get('/list', 'App\Http\Controllers\Web\ApplicationController@list')->name('main');
    Route::get('/{id}', 'App\Http\Controllers\Web\ApplicationController@show')->name('application.show');
    Route::post('/{id}/update', 'App\Http\Controllers\Web\ApplicationController@update')->name('application.update');
});
