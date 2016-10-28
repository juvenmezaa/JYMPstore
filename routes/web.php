<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get("/", "principalController@index");
Route::get("/twitter", "principalController@twitter");
Route::get("/facebook", "principalController@facebook");
Route::get("/instagram", "principalController@instagram");

Auth::routes();

Route::get("/home", "HomeController@index");
