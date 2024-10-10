<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Profile;
class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::all();
        return response() -> json(['profiles' => $profile]);
    }

     public function show($stu_id){
        $profile = Profile::all()->find($stu_id);
        if (!$profile) {
            return response()->json(['error' => 'Proifle not found'], 404);
        }
        return response()->json(['profile' => $profile],200);
    }

    public function update(Request $request, $id){
        $validator = $request->validate([
            'FirstName' => 'string|max:20',
            'LastName' => 'string|max:20',
            'Course' => 'string|max:20',
            'Department' => 'string|max:20',
            'Year' => 'int|max:4',
            'Status' => 'string|max:255',
            'stu_id' => 'string|exists:students,studentId'
        ]);

        $profile = Profile::find($id);
        if (!$profile) {
            return response()->json(['error' => 'Profile not found'], 404);
        }

        $profile->update($validator);

        return response()->json([
            'message' => 'Profile updated successfully',
            'profile' => $profile
        ], 200);
    }

     public function destroy($id){
        $profile = Profile::find($id);
        $profile -> delete();
        return response()-> json(['message' => 'Program Removed']);
    }
}
