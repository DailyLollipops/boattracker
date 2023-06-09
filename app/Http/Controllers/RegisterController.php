<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Boat;
use App\Models\User;
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

    public function registerAccount(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password'
        ],
        [
            'name.required' => 'Personnel name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email already exist',
            'password.required' => 'Password is required',
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

        $user_form = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        $user = User::create($user_form);
        flash()->addSuccess('Personnel successfully registered');
        return back();
    }
}
