<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function create() {
        return view('auth.forgot-password');
    }

    public function store(Request $request) {
    $request->validate([
        'email' => ['required', 'email', 'exists:users,email']
    ]);
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::ResetLinkSent
        ? back()->with(['status' => $status])   
        : back()->withErrors(['email' => $status]);
    }
}
