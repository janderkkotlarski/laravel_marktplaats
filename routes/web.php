<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AuthenticationController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::get('/user/register', [UserController::class, 'create'])->name('user.register');

Route::get('/user/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview');

Route::get('/email/verify', function() {
    dd('hello');

    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // dd($request);

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::post('/logout', [AuthenticationController::class, 'logout']);
Route::post('/user/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::redirect('/', 'adverts');

// Route::redirect('user/login', '/login');