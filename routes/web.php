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

Route::middleware(["auth", "dev"])->prefix("roles")->group(function(){
    Route::get("/", "RoleController@index");
    Route::get("/add", "RoleController@add");
    Route::post("/add", "RoleController@create");
    Route::get("/{role}/edit", "RoleController@edit");
    Route::post("/{role}/edit", "RoleController@update");
    Route::get("/{role}/delete", "RoleController@delete");
    Route::post("/{role}/delete", "RoleController@destroy");
});

Route::middleware(["auth", "dev"])->prefix("categories")->group(function(){
    Route::get("/", "CategoryController@index");
    Route::get("/add", "CategoryController@add");
    Route::post("/add", "CategoryController@create");
    Route::get("/{cat}/edit", "CategoryController@edit");
    Route::post("/{cat}/edit", "CategoryController@update");
    Route::get("/{cat}/delete", "CategoryController@delete");
    Route::post("/{cat}/delete", "CategoryController@destroy");
});

Route::middleware(["auth", "dev"])->prefix("makes")->group(function(){
    Route::get("/", "MakeController@index");
    Route::get("/add", "MakeController@add");
    Route::post("/add", "MakeController@create");
    Route::get("/{cat}/edit", "MakeController@edit");
    Route::post("/{cat}/edit", "MakeController@update");
    Route::get("/{cat}/delete", "MakeController@delete");
    Route::post("/{cat}/delete", "MakeController@destroy");
});