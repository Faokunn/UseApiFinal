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
    public function show($id){
        $data = Course::where('department_id', $id)->get();
        return response()->json($data);
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:10|string',
        ]);
        Course::create([
            'name' => $request->name,
        ]);
        return response()->json(['message' => "Added Succesfully"]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'max:10|string',
        ]);
        $data = Course::findOrFail($id);
        $data->update([
            'name' => $request->name,
        ]);
        return response()->json(['message' => "Updated Succesfully"]);
    }
    public function destroy($id){
        $data = Course::find($id);
        $data -> delete();
        return response()->json(['message' => "Deleted Successfully"]);
    }
}
