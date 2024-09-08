<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($id){
        $data = Course::where('department_id', $id)->get();
        return response()->json($data);
    }
    public function create(Request $request){ //lagyan ng id dito mayhaps (unfinished)
        $request->validate([
            'name' => 'required|max:10|string',
        ]);
        Course::create([
            'name' => $request->name,
            // IDK MAN 'department_id' => $photo, //unfinished
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
