<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'adminID' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
    
        // Check if the student exists
        $student = Admin::where('adminID', $request->adminID)->first();
    
        if (!$student) {
            return response()->json([
                'message' => 'Admin not found'
            ], 404);
        }
    
        // Check if the password is correct
        if (Hash::check($request->password, $student->password)) {
            $token = $student->createToken('auth-token')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'data' => $student
            ], 200);
        } else {
            return response()->json([
                'message' => 'Incorrect credentials'
            ], 401); // Use 401 Unauthorized status code
        }
    }
    
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'user successfully logged out',
        ], 200);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'adminID' => 'required|string|max:20',
            'password' => 'required|string||max:16',
        ]);

        if ($validator->fails()){
            return response()->json([
                'message'=> 'Failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Admin::create([
            'adminID'=>$request->adminID,
            'password'=>Hash::make($request->password)
        ]);

        return response()->json([
            'message'=> 'Registration successful',
            'data'=>$user
        ], 200);
    }
}


