<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::resource('/post',PostController::class);
    Route::resource('/comment',CommentController::class);
});
