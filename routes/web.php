<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthenticationController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::get('/user/register', [UserController::class, 'create'])->name('user.register');



Route::get('/email/verify', [AuthenticationController::class, 'verify_email'])->middleware('auth')->name('verification.notice');

Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::redirect('/', 'adverts');