<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirectToHomepage(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        else{
            return view('login');
        }
    }

    public function redirectToDashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        else{
            return redirect('/');
        }
    }

    public function redirectToAdmin(){
        if(Auth::check()){
            return view('admin');
        }
        else{
            return redirect('/');
        }
    }
}
