<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ReminderController extends Controller
{

    public function reminder(Request $request)
    {
      
       $validator = Validator::make($request->all(), [
            'title' => 'required ',        
 
           ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' =>implode("\n",$validator-> messages()-> all()) ]);
            }
            
        $reminder =new Reminder();
        
         $reminder->user_id=auth('api')->user()->id; 
         $reminder->dose_date =$request->dose_date ;
         $reminder->title =$request->title ;
         $reminder->medicine_id =$request->event_category_id ;
         $reminder->remind_at =$request->remind_at ;
         $reminder->save();
         
        
        $message = __('api.ok');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'reminder'=>$reminder]);

    }

}
