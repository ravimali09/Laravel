<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SocietyMemberController;
use App\Http\Controllers\SocietyWatchmanController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\EventController;
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

Route::get('/', function () {
    return view('layouts.base');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/profile', [CustomerController::class, 'profile']);
    Route::get('/members', [SocietyMemberController::class, 'index']);
    Route::get('/watchmen', [SocietyWatchmanController::class, 'index']);
    Route::get('/notices', [NoticeController::class, 'index']);
    Route::get('/events', [EventController::class, 'index']);
});

