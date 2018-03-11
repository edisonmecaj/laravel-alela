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
    Route::get("/{make}/edit", "MakeController@edit");
    Route::post("/{make}/edit", "MakeController@update");
    Route::get("/{make}/delete", "MakeController@delete");
    Route::post("/{make}/delete", "MakeController@destroy");
});

Route::middleware(["auth", "dev"])->prefix("models")->group(function(){
    Route::get("/", "ModelController@index");
    Route::get("/add", "ModelController@add");
    Route::post("/add", "ModelController@create");
    Route::get("/{model}/edit", "ModelController@edit");
    Route::post("/{model}/edit", "ModelController@update");
    Route::get("/{model}/delete", "ModelController@delete");
    Route::post("/{model}/delete", "ModelController@destroy");
});

Route::middleware(["auth", "dev"])->prefix("attributes")->group(function(){
    Route::get("/", "AttributeController@index");
    Route::get("/add", "AttributeController@add");
    Route::post("/add", "AttributeController@create");
    Route::post("/sort", "AttributeController@updateSort");
    Route::get("/{attr}/edit", "AttributeController@edit");
    Route::post("/{attr}/edit", "AttributeController@update");
    Route::get("/{attr}/delete", "AttributeController@delete");
    Route::post("/{attr}/delete", "AttributeController@destroy");
});