<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/dang-xuat', [\App\Http\Controllers\HomeController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/dang-nhap', [\App\Http\Controllers\LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/dang-nhap', [\App\Http\Controllers\LoginController::class, 'authentcation'])->middleware('guest');

