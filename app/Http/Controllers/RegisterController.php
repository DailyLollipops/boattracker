<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerOwner(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:owners,name',
            'contact' => 'required|regex:/^(09)\d{9}$/',
            'barangay' => 'required|different:null'
        ],
        [
            'name.required' => 'Name field is required',
            'name.unique' => 'Owner already exist',
            'contact.required' => 'Contact no. is required',
            'contact.regex' => 'Invalid contact number format',
            'barangay.required' => 'Barangay field is required',
            'barangay.different' => 'Please select barangay'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $owner_form = [
            'name' => $request->name,
            'contact' => $request->contact,
            'barangay' => $request->barangay
        ];
        $owner = Owner::create($owner_form);
        flash()->addSuccess('Owner successfully registered');
        return back();
    }

    public function registerBoat(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'license' => 'required',
            'type' => 'required|different:null',
            'color' => 'required|different:null',
            'owner' => 'required|different:null',
        ],
        [
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

        $boat_form = [
            'name' => $request->name,
            'license' => $request->license,
            'type' => $request->type,
            'color' => $request->color,
            'owner_id' => $request->owner
        ];

        $boat = Boat::create($boat_form);
        flash()->addSuccess('Boat successfully registered');
        return back();
    }
}
