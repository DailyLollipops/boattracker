<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class FetchController extends Controller
{
    public function getTracker(Request $request){
        $tracker = Tracker::where('id',$request->id)->first();
        return response()->json([
            'tracker' => $tracker
        ]);
    }
}
