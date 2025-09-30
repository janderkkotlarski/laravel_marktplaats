<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthenticationController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::get('/adverts/create', [AdvertController::class, 'create'])->middleware(['auth', 'verified'])->name('advert.create');
Route::post('/adverts/create', [AdvertController::class, 'store'])->middleware(['auth', 'verified'])->name('advert.store');

Route::get('adverts/{advert}/edit', [AdvertController::class, 'edit'])->middleware(['auth', 'verified'])->name('adverts.edit');

Route::get('/user/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/user/overview', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user.overview');

Route::get('/user/register', [UserController::class, 'create'])->middleware('guest')->name('user.register');
Route::post('/user/register', [UserController::class, 'store'])->middleware('guest')->name('user.store');

Route::get('/user/notify', [VerificationController::class, 'notify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/forgot-password', [AuthenticationController::class, 'forgot'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthenticationController::class, 'mail'])->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [AuthenticationController::class, 'reset'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthenticationController::class, 'password'])->middleware('guest')->name('password.update');

Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::redirect('/', 'adverts');