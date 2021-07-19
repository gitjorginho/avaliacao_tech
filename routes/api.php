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


Route::post('auth/login', 'AuthController@login');

Route::group([ 'middleware' => ['api','auth:api']], function ($router) {

    Route::resource('tarefas','TarefaController');
    Route::post('tarefas/concluido/{tarefa}','TarefaController@concluido');


    Route::group(['prefix'=>'auth'],function ($router){
        Route::get('/all','AuthController@all');
        Route::post('store','AuthController@store');
        Route::delete('/{user}','AuthController@destroy');
        Route::put('/{user}','AuthController@update');


        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });


});