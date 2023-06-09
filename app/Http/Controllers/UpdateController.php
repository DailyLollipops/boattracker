<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    public function updateTracker(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:trackers,id',
            'serial' => 'required',
            'boat' => 'nullable'
        ],
        [
            'id.required' => 'Tracker ID is required',
            'id.exists' => 'Tracker ID does not exist',
            'serial.required' => 'Tracker Serial Number is required' 
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $rules = [];
        $error_messages = [];
        $tracker = Tracker::find($request->id);
        if($request->boat == "null"){
            $request->merge(['boat' => null]);
        }
        if($tracker->serial != $request->serial){
            $rules['serial'] = 'unique:trackers,serial';
            $error_messages['serial.unique'] = 'Tracker is already registered';
        }
        if($tracker->boat_id != $request->boat){
            $rules['boat'] = 'exists:boats,id|unique:trackers,boat_id';
            $error_messages['boat.exists'] = 'Boat does not exist';
            $error_messages['boat.unique'] = 'A tracker is already attached to the selected boat';
        }
        $validator = Validator::make($request->all(), $rules, $error_messages);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $tracker->serial = $request->serial;
        $tracker->boat_id = $request->boat;
        $tracker->save();
        flash()->addSuccess('Tracker info updated successfully');
        return back();
    }
}
