<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_process(LoginRequest $request)
    {
        $remember = $request->has('remember');
        $user = User::where('email', '=', $request->input('email'))
            ->first();
        if (!empty($user)) {
            if (Hash::check($request->input('password'), $user->password)) {
                if (Auth::attempt($request->only('email', 'password'), $remember)) {
                    return redirect()->route('dashboard');
                }
            }
        }
        return redirect()->route('login')
            ->with('error', 'Email atau Password Salah !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
