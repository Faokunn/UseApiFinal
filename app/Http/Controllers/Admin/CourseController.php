<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Course;

class CourseController extends Controller
{
    // SHOWS ALL COURSES
    public function index(){
        $data = Course::all();
        return response()->json($data);
    }
    // SHOWS COURSES SPECIFIC TO DEPARTMENT
    public function show($departmentID){
        $data = Course::where('departmentID', $departmentID)->get();
        return response()->json($data);
    }
    public function create(Request $request){
        $request->validate([
            'courseName' => 'required|max:10|string',
            'departmentID' => 'required|max:10|int',
            'courseDescription' => 'required|max:10|string',
        ]);
        Course::create([
            'name' => $request->name,
        ]);
        return response()->json(['message' => "Added Succesfully"]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'courseName' => 'required|max:10|string',
            'departmentID' => 'required|max:10|int',
            'courseDescription' => 'required|max:10|string',
        ]);
        $data = Course::findOrFail($id);
        $data->update([
            'courseName' => 'required|max:10|string',
            'departmentID' => 'required|max:10|int',
            'courseDescription' => 'required|max:10|string',
        ]);
        return response()->json(['message' => "Updated Succesfully"]);
    }
    public function destroy($id){
        $data = Course::find($id);
        $data -> delete();
        return response()->json(['message' => "Deleted Successfully"]);
    }
}
