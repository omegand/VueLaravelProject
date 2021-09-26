<?php

use App\Http\Controllers\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('/post')->group(function () {
    Route::get('/', [PostController::class, 'getPosts']);
    Route::post('/store','App\Http\Controllers\PostController@savePost');
    Route::put('/{id}', 'App\Http\Controllers\PostController@updatePost');
    Route::delete('/{id}', 'App\Http\Controllers\PostController@deletePost');
});
