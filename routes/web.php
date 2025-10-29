<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\MessageController;

use App\Order;

Route::redirect('/', 'adverts');

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.list');
Route::get('/adverts/{advert}/show', [AdvertController::class, 'show'])->name('adverts.page');

Route::middleware(['guest'])->group(function () {
    Route::get('/user/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');    

    Route::get('/user/register', [UserController::class, 'create'])->name('user.register');
    Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

    Route::get('/forgot-password', [AuthenticationController::class, 'forgot'])->name('password.request');
    Route::post('/forgot-password', [AuthenticationController::class, 'mail'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthenticationController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [AuthenticationController::class, 'password'])->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/notify', [VerificationController::class, 'notify'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    Route::post('/logout', [AuthenticationController::class, 'logout']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/adverts/create', [AdvertController::class, 'create'])->name('adverts.create');
    Route::post('/adverts/create', [AdvertController::class, 'store'])->name('adverts.store');

    Route::get('/adverts/{advert}/edit', [AdvertController::class, 'edit'])->name('adverts.edit');
    Route::patch('/adverts/{advert}', [AdvertController::class, 'update'])->name('adverts.update');

    Route::get('/adverts/{advert}/delete', [AdvertController::class, 'delete'])->name('adverts.delete');
    Route::get('/adverts/{advert}/destroy', [AdvertController::class, 'destroy'])->name('adverts.destroy');

    Route::post('/bids/store', [BidController::class, 'store'])->name('bids.store');

    Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{message}/show', [MessageController::class, 'show'])->name('messages.page');

    Route::get('/messages/overview', [MessageController::class, 'index'])->name('messages.list');
    Route::get('/messages/sent', [MessageController::class, 'libs'])->name('messages.roster');

    Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview');
});