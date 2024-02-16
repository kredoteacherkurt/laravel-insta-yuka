<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

    Route::resource('/post', PostController::class);
    Route::resource('/comment', CommentController::class);

    Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    // profile edit
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // profile update
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
