<?php

use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\TopicsController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::get('user', UserController::class)->name('user')->middleware('auth:sanctum');
//Route::post('user');


Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::get('topics/{topic}/posts', [TopicsController::class, 'posts'])->name('topics.posts');
    Route::get('posts/{post}/topic', [PostsController::class, 'topic'])->name('posts.topic');

    Route::apiResource('images', ImageController::class)->only(['store', 'show', 'destroy']);

    Route::apiResources([
        'topics' => TopicsController::class,
        'posts'  => PostsController::class
    ]);

});
