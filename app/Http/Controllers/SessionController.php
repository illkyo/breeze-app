<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }
    
    public function store() {

        $validated = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => 'Credentials do not match. Try Again.'
            ]);
        };
        request()->session()->regenerate();
        return redirect('/');
        // $executed = RateLimiter::attempt(
        //     'login-attempt:'.request()->id,
        //     $perMinute = 5,
        //     function() {
        //         };
        //     }
        // );
    }

    public function delete() {
        Auth::logout();
        return redirect('/');
    }
}
