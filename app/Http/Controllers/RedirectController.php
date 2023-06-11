<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Boat;
use App\Models\Tracker;
use App\Models\User;
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
        
        $owners = Owner::all();
        $boats = Boat::all();

        return view('dashboard', [
            'owners' => $owners,
            'boats' => $boats
        ]);
    }

    public function redirectToTrackers(){
        if(!Auth::check()){
            return redirect('/');
        }
        
        $owners = Owner::all();
        $boats = Boat::all();
        $trackers = Tracker::all();
        
        return view('trackers', [
            'owners' => $owners,
            'boats' => $boats,
            'trackers' => $trackers
        ]);
    }

    public function redirectToBoats(){
        if(!Auth::check()){
            return redirect('/');
        }
        
        $owners = Owner::all();
        $boats = Boat::all();
        
        return view('boats', [
            'owners' => $owners,
            'boats' => $boats
        ]);
    }

    public function redirectToPersonnels(){
        if(!Auth::check()){
            return redirect('/');
        }
        
        $owners = Owner::all();
        $boats = Boat::all();
        $personnels = User::all();
        
        return view('personnels', [
            'owners' => $owners,
            'boats' => $boats,
            'personnels' => $personnels
        ]);
    }
}
