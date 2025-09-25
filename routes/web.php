<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AuthenticationController;

Route::get('/adverts', [AdvertController::class, 'index'])->name('adverts.overview');

Route::get('/user/register', [UserController::class, 'create'])->name('user.register');
Route::get('/user/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/user/overview', [UserController::class, 'index'])->name('user.overview')->middleware(['auth', 'verified']);

Route::get('/user/notify', [VerificationController::class, 'notify'])->name('verification.notice')->middleware('auth');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('/email/verification-notification', [VerificationController::class, 'resend'])->name('verification.send')->middleware(['auth', 'throttle:6,1']);

// Route::get('/password/new', [AuthenticationController::class, 'password'])->name('password.reset')->middleware('guest');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::ResetLinkSent
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// Route::post('/password/reset', [AuthenticationController::class, 'reset'])->name('reset.password')->middleware('guest');

Route::post('/user/register', [UserController::class, 'store'])->name('user.store');

Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::redirect('/', 'adverts');