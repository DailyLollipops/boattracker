<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
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
}
