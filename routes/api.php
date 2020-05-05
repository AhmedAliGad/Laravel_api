<?php

use App\Http\Controllers\API\CategoriesController;
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

/* ====== Sign =======*/
Route::post('register', 'AuthController@register')->name('register');
Route::post('login', 'AuthController@login')->name('login');

/*====== Categories =======*/
Route::apiResource('categories', 'CategoriesController', ['only' => ['index', 'show']]);
//Route::get('posts/{post}', 'CategoriesController@showPost')->name('show_post');
Route::get('posts/{post:id}', [CategoriesController::class, 'showPost'])->name('show_post');

Route::middleware('auth:api')->group(function () {
    /* ====== Logout =======*/
    Route::post('logout', 'AuthController@logout');
});
