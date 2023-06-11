<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
use App\Models\Setting;
use App\Models\User;
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

    public function updatePersonnel(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id',
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password-current' => 'current_password'
        ],
        [
            'id.required' => 'Personnel ID is required',
            'id.exists' => 'Personnel not found',
            'name.required' => 'Name is required',
            'name.min' => 'Name should be at least 3 character',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'password-current.current_password' => 'Password does not match saved password'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $personnel = User::find($request->id);
        if($personnel->email != $request->email){
            $validator = Validator::make($request->all(), [
                'email' => 'unique:users,email'
            ],
            [
                'email.unique' => 'Email is already registered'
            ]);
            if($validator->fails()){
                foreach($validator->messages()->all() as $message){
                    flash()->addError($message);
                }
                return back()->withInput();
            }
        }

        if($request->password != null){
            $validator = Validator::make($request->all(),[
                'password' => 'min:8',
                'password-confirm' => 'required|same:password'
            ],
            [
                'password.min' => 'Password should contain at least 8 characters',
                'password-confirm.required' => 'Please confirm your password',
                'password-confirm.same' => 'Passwords do not match'
            ]);
            if($validator->fails()){
                foreach($validator->messages()->all() as $message){
                    flash()->addError($message);
                }
                return back()->withInput();
            }
        }

        if($personnel->name != $request->name){
            $personnel->name = $request->name;
        }
        if($personnel->email != $request->email){
            $personnel->email = $request->email;
        }
        if($request->password != null){
            $personnel->password = bcrypt($request->password);
        }
        $personnel->save();

        flash()->addSuccess('Account credentials updated succesfully');
        return back();
    }
}
