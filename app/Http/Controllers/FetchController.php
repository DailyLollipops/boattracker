<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function getTracker(Request $request){
        $tracker = Tracker::where('id',$request->id)->first();
        return response()->json([
            'tracker' => $tracker
        ]);
    }

    public function getBoat(Request $request){
        $boat = Boat::where('id',$request->id)->first();
        return response()->json([
            'boat' => $boat
        ]);
    }

    public function getContact(){
        $contact = Setting::first()->contact;
        return response()->json([
            'contact' => $contact
        ]);
    }

    public function getBoats(){
        $boats = Boat::with('owner')->with('tracker')->get();
        $return = array();
        foreach($boats as $boat){
            $return[$boat->id] = $boat;
        }

        return response()->json([
            'data' => $return
        ]);
    }

    public function getPersonnel(Request $request){
        $personnel = User::where('id',$request->id)->first();
        return response()->json([
            'personnel' => $personnel
        ]);
    }
}
