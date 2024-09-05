<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AuthenticationController
{
    //LOGIN FUNCTION
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'admin_id' => 'required|max:14',
            'password' => 'required|min:6|max:20',

        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $user = Admin::where('admin_id', $request->admin_id)->first();

        if($user){
                
            if(Hash::check($request->password,$user->password)){
                    
                $token=$user->createToken('auth-token')->plainTextToken;

                return response()->json([
                    'message'=>'Login successful',
                    'token'=>$token,
                    'data'=>$user
                ], 200);
            }else{
                return response()->json(    [
                    'message' => 'Incorrect credentials'
                ], 400);
                
            }
        }
    }
}
