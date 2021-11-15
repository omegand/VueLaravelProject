<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('/topic/post')->group(function () {
    Route::get('/{id}', [PostController::class, 'getPost']);
    Route::post('/','App\Http\Controllers\PostController@savePost');
    Route::put('/{id}', 'App\Http\Controllers\PostController@updatePost');
    Route::delete('/{id}', 'App\Http\Controllers\PostController@deletePost');
});
Route::get('/topic/{id}/post', [PostController::class,   'getPosts']);
Route::prefix('/topic')->group(function () {
    Route::get('/', [TopicController::class, 'getTopics']);
    Route::get('/{id}', [TopicController::class, 'getTopic']);
    Route::post('/',[TopicController::class, 'saveTopic']);
    Route::put('/{id}', [TopicController::class, 'updateTopic']);
    Route::delete('/{id}', [TopicController::class, 'deleteTopic']);
});

Route::group(['prefix' => 'user', 'middleware' => ['json']], function() {
    Route::get('/post', [PostController::class, 'getUserPosts']);
    Route::get('/', [UserController::class, 'getusers']);
    Route::get('/{id}', [UserController::class, 'getuser']);
    Route::post('/',[UserController::class, 'saveuser']);
    Route::put('/{id}', [UserController::class, 'updateuser']);
    Route::delete('/{id}', [UserController::class, 'deleteuser']);
});

Route::fallback(function(){
    return response()->json([
        'message' => 'Route does not exist, check the syntax.'], 400);
});
