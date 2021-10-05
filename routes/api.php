<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
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
Route::prefix('/topic')->group(function () {
    Route::get('/', [TopicController::class, 'getTopics']);
    Route::get('/{id}', [TopicController::class, 'getTopic']);
    Route::post('/',[TopicController::class, 'saveTopic']);
    Route::put('/{id}', [TopicController::class, 'updateTopic']);
    Route::delete('/{id}', [TopicController::class, 'deleteTopic']);
});
Route::get('/topic/{id}/post', [PostController::class, 'getPosts']);
Route::prefix('/topic/post')->group(function () {
    Route::get('/{id}', [PostController::class, 'getPost']);
    Route::post('/','App\Http\Controllers\PostController@savePost');
    Route::put('/{id}', 'App\Http\Controllers\PostController@updatePost');
    Route::delete('/{id}', 'App\Http\Controllers\PostController@deletePost');
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Route does not exist, check the syntax.'], 404);
});
