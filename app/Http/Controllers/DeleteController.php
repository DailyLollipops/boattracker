<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeleteController extends Controller
{
    public function deleteTracker(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:trackers,id'
        ],
        [
            'id.required' => 'Id field is required',
            'id.exist' => 'Tracker ID does not exist'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $tracker = Tracker::find($request->id);
        $tracker->delete();
        flash()->addSuccess('Tracker successfully deleted');
        return back();
    }

    public function deleteBoat(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:boats,id'
        ],
        [
            'id.required' => 'Id field is required',
            'id.exist' => 'Boat ID does not exist'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $boat = Boat::find($request->id);
        if($boat->tracker != null){
            $boat->tracker->boat_id = null;
            $boat->tracker->save();   
        }
        $boat->delete();
        flash()->addSuccess('Boat successfully deleted');
        return back();
    }

    public function deletePersonnel(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:users,id|gt:1'
        ],
        [
            'id.required' => 'Id field is required',
            'id.exist' => 'User ID does not exist',
            'id.gt' => 'Admin account cannot be deleted'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $user = User::find($request->id);
        $user->delete();
        flash()->addSuccess('Personnel account successfully deleted');
        return back();
    }
}
