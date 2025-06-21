<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::get('/', [HomeController::class ,'index']) ->name('homepage');

Route::get('/yazilar', [PostController::class ,'index'])->name('blog.index');