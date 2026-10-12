<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/buttons', [PublicController::class, 'buttons'])->name('buttons');
Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');
