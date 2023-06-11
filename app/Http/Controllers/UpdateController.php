<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
use App\Models\Setting;
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
            $rules['boat'] = 'nullable|unique:trackers,boat_id';
            $error_messages['boat.unique'] = 'A tracker is already attached to selected boat';
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

        if($tracker->boat_id != null){
            $boat = Boat::find($tracker->boat_id);
            if($tracker->latest_coordinate != null){
                $boat->latitude = $tracker->latest_coordinate->latitude;
                $boat->longitude = $tracker->latest_coordinate->longitude;
            }
            $boat->save();
        } 

        flash()->addSuccess('Tracker info updated successfully');
        return back();
    }

    public function updateBoat(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:boats,id',
            'name' => 'required',
            'license' => 'required',
            'type' => 'required|different:null',
            'color' => 'required|different:null',
            'owner' => 'required|different:null',
        ],
        [
            'id.required' => 'ID is required',
            'id.exists' => 'ID does not exists',
            'name.required' => 'Boat name field is required',
            'license.required' => 'Boat license field is required',
            'type.required' => 'Boat type field is required',
            'type.different' => 'Select boat type',
            'color.required' => 'Boat color field is required',
            'color.different' => 'Select boat color',
            'owner.required' => 'Boat owner is required',
            'owner.different' => 'Select boat owner'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $boat = Boat::find($request->id);
        $boat->name = $request->name;
        $boat->license = $request->license;
        $boat->type = $request->type;
        $boat->color = $request->color;
        $boat->owner_id = $request->owner;
        $boat->save();
        flash()->addSuccess('Boat updated successfully');
        return back();
    }

    public function updateContact(Request $request){
        $validator = Validator::make($request->all(), [
            'contact' => 'required|regex:/^(09)\d{9}$/'
        ],
        [
            'contact.required' => 'Contact no. is required',
            'contact.regex' => 'Invalid contact number format'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $setting = Setting::first();
        $setting->contact = $request->contact;
        $setting->save();
        flash()->addSuccess('Emergency contact number successfully changed');
        return back();
    }
}
