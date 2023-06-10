<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->get('remember'))) {
            $request->session()->regenerate();
            flash()->addSuccess('Login successfully');
            return redirect()->intended('dashboard');
        }

        flash()->addError('No credentials found!');
        return back()->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash()->addSuccess('Logout successfully');
        return redirect('/');
    }
}
