<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
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
}
