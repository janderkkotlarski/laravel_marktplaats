<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
     public function login() {        
        return view('user.login');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->remember and $request->remember == 1;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.overview'));
        }
        
        return back()->withErrors([
            'email' => 'Opgegeven emailadres en/of wachtwoord is onjuist.',
        ])->onlyInput('email');
    } 

     public function forgot() {
        return view('auth.forgot-password');
    }
    
    public function mail(Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink(
            $request->only('email')
        );
    
        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }   

    public function reset(string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function password(Request $request) {
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
    }
}