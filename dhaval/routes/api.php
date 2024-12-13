<?php
use Illuminate\Support\Facades\Route;

// Author Routes
Route::post('/register', [AuthorController::class, 'register']);
Route::post('/login', [AuthorController::class, 'login']);
Route::post('/logout', [AuthorController::class, 'logout'])->middleware('auth:api');

// Category Routes
Route::middleware('auth:api')->group(function () {
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::put('/category/{id}/update', [CategoryController::class, 'update']);
    Route::delete('/category/{id}/remove', [CategoryController::class, 'destroy']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category/{id}/show', [CategoryController::class, 'show']);
    Route::get('/category/{keyword}/search', [CategoryController::class, 'search']);
});

// Other routes...
