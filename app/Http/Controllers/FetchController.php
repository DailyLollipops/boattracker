<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
use App\Models\Setting;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FetchController extends Controller
{
    public function getTracker(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:trackers,id'
        ],
        [
            'id.required' => 'ID is required',
            'id.exists' => 'Tracker not found'
        ]);
        if($validator->fails()){
            return response()->json([
                'tracker' => []
            ]);
        }

        $tracker = Tracker::where('id',$request->id)->first();
        return response()->json([
            'tracker' => $tracker
        ]);
    }

    public function getBoat(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:boats,id'
        ],
        [
            'id.required' => 'ID is required',
            'id.exists' => 'Boat not found'
        ]);
        if($validator->fails()){
            return response()->json([
                'boat' => []
            ]);
        }
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
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id'
        ],
        [
            'id.required' => 'ID is required',
            'id.exists' => 'Personnel not found'
        ]);
        if($validator->fails()){
            return response()->json([
                'personnel' => []
            ]);
        }
        $personnel = User::where('id',$request->id)->first();
        return response()->json([
            'personnel' => $personnel
        ]);
    }

    public function getLogs(){
        $boats = Boat::with('logs')->get();
        
        $array = array();
        foreach($boats as $boat){
            $previous = null;
            foreach($boat->logs as $log){
                if($log->status != $previous){
                    $previous = $log->status;
                    array_push($array, $log);
                }
            }
        }
        $collection = collect($array)->keyBy('created_at')->sortDesc();

        return response()->json([
            'logs' => $collection
        ]);
    }
}
