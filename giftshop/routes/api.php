<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/show_cust_api',[CustomerController::class,'show_cust_api']); 
Route::get('/show_cust_single_api/{id}',[CustomerController::class,'show_cust_single_api']); 
Route::post('/insert_cust',[CustomerController::class,'insert_cust']);
Route::put('/update_cust/{id}',[CustomerController::class,'update_cust']);
Route::get('/search_cust/{key}',[CustomerController::class,'search']); 
Route::post('/login',[CustomerController::class,'cust_login']); 
