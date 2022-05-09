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


// Route User
Route::post('users/register','App\Http\Controllers\UserController@register');
Route::post('users/login', 'App\Http\Controllers\UserController@login'); 
Route::middleware('auth:sanctum')->post('users/logout', 'App\Http\Controllers\UserController@logout');
Route::middleware('auth:sanctum')->get('user', 'App\Http\Controllers\UserController@show');
Route::middleware('auth:sanctum')->put('user', 'App\Http\Controllers\UserController@update'); 
Route::middleware('auth:sanctum')->put('userPassword', 'App\Http\Controllers\UserController@updatePassword'); 

// Route Films
Route::get('films','App\Http\Controllers\FilmController@index');
Route::get('films/{id}','App\Http\Controllers\FilmController@show');
Route::middleware(['auth:sanctum', 'admin'])->post('films','App\Http\Controllers\FilmController@store');
Route::middleware(['auth:sanctum', 'admin'])->delete('films/{id}','App\Http\Controllers\FilmController@destroy');

// Route Critics
Route::middleware(['auth:sanctum', 'critic'])->post('critics','App\Http\Controllers\CriticController@store');

// Route Acteurs
Route::get('actors/{id}','App\Http\Controllers\ActorController@show');