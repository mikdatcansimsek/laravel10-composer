<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


Route::get('/', [HomeController::class ,'index']) ->name('homepage');

Route::get('/yazilar', [PostController::class ,'index'])->name('blog.index');

Route::get('urunler', [ProductController::class ,'index']);
Route::get('urunler/ekle', [ProductController::class ,'create']);
Route::post('urunler/ekle', [ProductController::class ,'store']);
Route::get('urunler/duzenle/{id}', [ProductController::class ,'edit']);
Route::post('urunler/duzenle/{id}', [ProductController::class ,'update']);
Route::get('urunler/sil/{id}', [ProductController::class ,'destroy']);
