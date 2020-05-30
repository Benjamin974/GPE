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

Route::middleware('auth:api')->prefix('users')->group(function () {
    Route::get('/', 'UsersController@index');
    Route::get('/{id}', 'UsersController@user')->where('id', "[0-9]+");
});

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout')->middleware('auth:api');

Route::middleware('auth:api')->prefix('programmes')->group(function () {
    Route::get('/', 'ProgrammesController@index');
    Route::get('/{id}', 'ProgrammesController@show')->where('id', "[0-9]+");
    Route::post('/', 'ProgrammesController@add');
    Route::post('/{id}', 'ProgrammesController@update')->where('id', "[0-9]+");
    Route::post('/seance/{id}', 'SeancesController@update')->where('id', "[0-9]+");
    Route::delete('/{id}', 'ProgrammesController@delete')->where('id', "[0-9]+");
    Route::get('/coach/{id}', 'ProgrammesController@addProgrammesProducteur')->where('id', "[0-9]+");

});


Route::middleware('auth:api')->prefix('client/programmes')->group(function() {
    Route::get('/', 'ProgrammesController@index');
    Route::post('/', 'ProgrammesController@clientHasProgramme');
    Route::post('/delete', 'ProgrammesController@deleteProgramme');
});

