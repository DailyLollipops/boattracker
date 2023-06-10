<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Boat;
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
        $boat->tracker->boat_id = null;
        $boat->tracker->save();
        $boat->delete();
        flash()->addSuccess('Boat successfully deleted');
        return back();
    }
}
