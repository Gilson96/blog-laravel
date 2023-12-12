<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', "App\Http\Controllers\Articles@index")->name('index');

Route::group(["prefix" => "articles"], function () {
    // add *above* route with URL parameter
    // otherwise 'create' will get included in that
    Route::get('create', "App\Http\Controllers\Articles@create");
    // a *post* request
    // needs to go to a different controller method
    Route::post('create', "App\Http\Controllers\Articles@createPost");
    Route::get('{article}', "App\Http\Controllers\Articles@show");
       // delete article
    Route::get('destroy/{article}', "App\Http\Controllers\Articles@destroy"); 
    // update article
    Route::group(["prefix" => "edit"], function(){
        Route::get('{article}', "App\Http\Controllers\Articles@edit");   
        Route::post('{article}', "App\Http\Controllers\Articles@update");
    }); 

    
    Route::group(["prefix" => "comments"], function(){
        Route::get('{article}', "App\Http\Controllers\Articles@createComment");   
        Route::post('{article}', "App\Http\Controllers\Articles@commentPost");
        Route::get('/destroy/{article}', "App\Http\Controllers\Articles@commentDestroy"); 
    }); 


});

Route::get('/about', function () {
    return view('about');
});