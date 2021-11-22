<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(array('prefix' => 'v1'), function()
{
    Route::group(array('prefix' => 'application'), function()
    {
        Route::post('/store', 'App\Http\Controllers\Api\ApiApplicationController@store');
        Route::get('/list', 'App\Http\Controllers\Api\ApiApplicationController@list');
        Route::get('/{id}', 'App\Http\Controllers\Api\ApiApplicationController@show');
        Route::post('/{id}/update', 'App\Http\Controllers\Api\ApiApplicationController@update');
    });
});

