<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ProductController::class,'index'] );
Route::get('/index',[ProductController::class,'index'] );

Route::get('/add_product',[ProductController::class,'create'] );
Route::post('/product_store',[ProductController::class,'store'] );

Route::get('edit_product/{id}',[ProductController::class,'edit'] );
Route::post('update_product/{id}',[ProductController::class,'update'] );
Route::get('delete_product/{id}',[ProductController::class,'destroy'] );




