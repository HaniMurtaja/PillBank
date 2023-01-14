<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Reminder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function forgotPassword(Request $request)
    {
        $rules = [
            'mobile' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }
        
        $checkUser = User::where('mobile', $request->mobile)->first();

        if ($checkUser) {
           
            $new_password = 123456;
            $checkUser->password = bcrypt($new_password);
            $checkUser->save(); 

            return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.new_password_sent')]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' =>__('api.pleaseEnterTrueEmail')]);
    }

    
    public function resetPassword(Request $request)
    {
    
        $rules = [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return mainResponse(false, '', null, 200, 'items', $validator);
        }
            
        $checkUser = auth('api')->user();
    
        $checkUser->password = bcrypt($request->get('password'));
        if($checkUser->save()) {
            $checkUser->refresh();
            $message = __('api.ok');
            return mainResponse(true, $message, null, 200, 'items', $validator);
        }
        
    }


    public function editProfile(Request $request)
    {
        
        $user_id = auth('api')->id();
        $user = User::findOrFail($user_id);

        $validator = Validator::make($request->all(), [
            'mobile' => 'required|unique:users,mobile,'.$user_id,
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator->messages()->all())]);
        }

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        
        if ($request->hasFile('image_profile')) {
            $image = $request->file('image_profile');
            $extention = $image->getClientOriginalExtension();
            $file_name = rand(1000000, 9999999) . "_" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
            Image::make($image)->save("uploads/users/$file_name");
            $user->image_profile = $file_name;
        }
        
        $done =  $user->save();

        $user['access_token'] = $user->createToken('mobile')->accessToken;
        return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'user' => $user]);
        }


        
    public function profile(){
        if(isset(auth('api')->user()->id)) {
            $user = auth('api')->user();
            $user['access_token'] = $user->createToken('mobile')->accessToken;
            return response()->json(['status' => true, 'code' => 200, 'message' =>__('api.ok'), 'user' => $user]);
        }
        return response()->json(['status' => false, 'code' => 201, 'message' =>__('api.nopermission')]);
    } 



    public function changePassword(Request $request)
    {
        
        $rules = [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 201, 'message' =>implode("\n",$validator-> messages()-> all())]);
        }
        
        $user = auth('api')->user();

        if (!Hash::check($request->get('old_password'), $user->password)) {
            $message = __('api.old_password'); //wrong old
            return response()->json(['status' => false, 'code' => 201,'message' => $message ]);
        }

        $user->password = bcrypt($request->get('password'));

        if ($user->save()) {
            $user->refresh();
            $message = __('api.ok');
            return response()->json(['status' => true, 'code' => 200,'message' => $message ]);
        }
        $message = __('api.whoops');
        return response()->json(['status' => false, 'code' => 201,'message' => $message ]);
    }


    public function logout()
    {
        $user_id = auth('api')->id();
        Token::where('user_id', $user_id)->delete();
        if (auth('api')->user()->token()->revoke()) {
            $message = 'logged out successfully';
            return response()->json(['status' => true, 'code' => 200,
                'message' => $message ]);
        } else {
            $message = 'logged out successfully';
            return response()->json(['status' => true, 'code' => 202,
                'message' => $message ]);
        }
    }



}
