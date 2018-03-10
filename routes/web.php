<?php

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
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajax_messages', 'HomeController@messages');

Route::middleware(["auth", "dev"])->prefix("menus")->group(function(){
    Route::get("/", "MenuController@index");
    Route::post("/", "MenuController@updateMenu");
    Route::get("/add", "MenuController@add");
    Route::post("/add", "MenuController@create");
    Route::post("/update", "MenuController@update");
    Route::post("/delete", "MenuController@delete");
});

Route::middleware(["auth"])->prefix("profile")->group(function(){
    Route::get("/", "UserController@index");
    Route::post("/", "UserController@update");
});