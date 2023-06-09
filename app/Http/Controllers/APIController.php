<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use App\Models\Tracker;
use App\Models\Track;
use App\Models\Setting;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
{
    public function updateTrack(Request $request){
        $validator = Validator::make($request->all(), [
            'serial' => 'required|exists:trackers,serial',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|in:safe,warning,restricted'
        ],
        [
            'serial.required' => 'Tracker serial is required',
            'serial.exists' => 'Tracker does not exists',
            'latitude.required' => 'Latitude is required',
            'latitude.numeric' => 'Invalid latitude format',
            'longitude.required' => 'Longitude is required',
            'longitude.numeric' => 'Invalid longitude format',
            'status.required' => 'Status is required',
            'status.in' => 'Invalid status'
        ]);
        if($validator->fails()){
            return response()->json([
                'response' => 'Failed'
            ]);
        }

        $tracker = Tracker::where('serial', $request->serial)->first();

        $track_form = [
            'tracker_id' => $tracker->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->status
        ];
        $track = Track::create($track_form);

        if($tracker->boat_id != null){
            $boat = Boat::find($tracker->boat_id);
            $boat->latitude = $request->latitude;
            $boat->longitude = $request->longitude;
            $boat->save();
            
            $log_form = [
                'boat_id' => $boat->id,
                'status' => $request->status
            ];
            $log = Log::create($log_form);
        }

        return response()->json([
            'response' => 'Success'
        ]);
    }

    public function getContact(){
        $setting = Setting::first();

        return $setting->contact;
    }

    public function getAttachedBoatData(Request $request){
        $validator = Validator::make($request->all(), [
            'serial' => 'required|exists:trackers,serial'
        ],
        [
            'serial.required' => 'Tracker serial is required',
            'serial.exists' => 'Tracker does not exists'
        ]);
        if($validator->fails()){
            return response()->json([
                'response' => 'Failed'
            ]);
        }
        
        $tracker = Tracker::where('serial', $request->serial)->first();
        
        if($tracker->boat == null){
            return response()->json([
                'response' => 'Not attached to any boat'
            ]);
        }
        
        return response()->json([
            'response' => 'Success',
            'id' => $tracker->boat->id,
            'name' => $tracker->boat->name
        ]);
    }
}
