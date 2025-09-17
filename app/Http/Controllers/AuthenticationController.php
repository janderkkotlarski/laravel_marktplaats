<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->remember and $request->remember == 1;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.overview'));
        }
        
        return back()->withErrors([
            'name' => 'Opgegeven gebruikersnaam en/of wachtwoord is onjuist.',
        ])->onlyInput('name');
    }
}