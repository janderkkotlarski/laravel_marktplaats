<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Support\Facades\Auth;



class VerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/');
    }

    public function notify() {
        $user = Auth::user();

        return view('user.notify')->with(compact('user'));
    }

    public function resend(Request $request) {
        dd($request);

        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }
}
