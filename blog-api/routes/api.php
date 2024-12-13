<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthorController;
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



// Author routes
Route::post('register', [AuthorController::class, 'register']);
Route::post('login', [AuthorController::class, 'login']);
Route::post('logout', [AuthorController::class, 'logout'])->middleware('auth:api');

// Category routes (Authentication Required)
Route::middleware('auth:api')->group(function () {
    Route::post('category/store', [CategoryController::class, 'store']);
    Route::put('category/{id}/update', [CategoryController::class, 'update']);
    Route::delete('category/{id}/remove', [CategoryController::class, 'destroy']);
});

// Article routes (Authentication Required)
Route::middleware('auth:api')->group(function () {
    Route::post('article/store', [ArticleController::class, 'store']);
    Route::put('article/{id}/update', [ArticleController::class, 'update']);
    Route::delete('article/{id}/remove', [ArticleController::class, 'destroy']);
});

// Comment routes (Authentication Required)
Route::middleware('auth:api')->group(function () {
    Route::post('comment/store', [CommentController::class, 'store']);
    Route::put('comment/{id}/update', [CommentController::class, 'update']);
    Route::delete('comment/{id}/remove', [CommentController::class, 'destroy']);
});



