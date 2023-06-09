<?php

namespace App\Http\Controllers;

use App\Models\Owner;
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
        if(!Auth::check()){
            return redirect('/');
        }
        
        return view('dashboard');
    }

    public function redirectToAdmin(){
        if(!Auth::check()){
            return redirect('/');
        }

        $owners = Owner::all();

        return view('admin', [
            'owners' => $owners
        ]);
    }
}
