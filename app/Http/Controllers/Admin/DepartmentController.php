<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $data = Department::all();
        return response()->json(['Departments' => $data]);
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:4|string',
            'color' => 'required|max:500|string',
            'photo' => 'required|max:500|string',
        ]);
        Department::create([
            'name' => $request->name,
            'color' => $request->color,
            'photo' => $request->photo,
        ]);
        return response()->json(['message' => "Added Succesfully"]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'max:10|string',
            'color' => 'max:25|string',
            'photo' => 'max:500|string',
        ]);
        $data = Department::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'color' => $request->color,
            'photo' => $request->photo,
        ]);
        return response()->json(['message' => "Updated Succesfully"]);
    }
    public function destroy($id){
        $data = Department::find($id);
        $data -> delete();
        return response()->json(['message' => "Deleted Successfully"]);
    }
}
