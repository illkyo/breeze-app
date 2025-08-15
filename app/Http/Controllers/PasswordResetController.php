<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function create(string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request) {
      
      $request->validate([
          'token' => ['required'],
          'email' => ['required', 'email'],
          'password' => ['required', 'min:6', 'confirmed'],
      ]);

      $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        });

      return $status === Password::PasswordReset
        ? redirect()->route('login')->with('status', $status)
        : back()->withErrors(['email' => $status]);
    }
}
