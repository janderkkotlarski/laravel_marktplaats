<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Support\Facades\Auth;



class VerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        $user = Auth::user();

        return view('user.verified')->with(compact('user'));
    }

    public function notify() {
        $user = Auth::user();

        return view('user.notify')->with(compact('user'));
    }

    public function resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verificatie-email herverstuurd!');
    }
}
