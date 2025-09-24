<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthenticationController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::get('/user/register', [UserController::class, 'create'])->name('user.register');

Route::get('/user/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview')->middleware(['auth', 'verified']);

Route::get('/user/notify', [VerificationController::class, 'notify'])->name('verification.notice')->middleware('auth');

/*
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
*/

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::post('/email/verification-notification', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);

/*
Route::post('/email/verification-notification', function () {
    // dd($request);

    // $request->user()->sendEmailVerificationNotification();
 
    // return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
*/

// Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->name('verification.send')->middleware(['auth', 'throttle:6,1']);

Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::redirect('/', 'adverts');