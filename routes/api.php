<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Articles;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// all of the routes are in the /articles end-point
Route::group(["prefix" => "articles"], function () {
    // GET /articles: show all articles
    Route::get("", [Articles::class, "index"]);
    // POST /articles: create a new article
    Route::post("", [Articles::class, "store"]);
    // all these routes also have an article ID in the
    // end-point, e.g. /articles/8
    Route::group(["prefix" => "{article}"], function () {
        // GET /articles/8: show the article
        Route::get("", [Articles::class, "show"]);
        // PUT /articles/8: update the article
        Route::put("", [Articles::class, "update"]);
        // DELETE /articles/8: delete the article
        Route::delete("", [Articles::class, "destroy"]);

      
    });
    Route::group(["prefix" => "comments"], function () {
        Route::get('{article}', "App\Http\Controllers\Articles@showComment");
        Route::get('{article}', "App\Http\Controllers\Articles@createComment");
        Route::post('{article}', "App\Http\Controllers\Articles@commentPost");
        Route::get('/destroy/{article}', "App\Http\Controllers\Articles@commentDestroy");
    });
  
});