<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Department;

class DepartmentController extends Controller
{
    public function index(){
        $data = Department::all();
        return response()->json($data);
    }
    public function store(Request $request) {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:20|string',
            'color' => 'required|max:500|string',
            'photo' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ]);
    
        // Initialize filename and path variables
        $filename = null;
    
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
    
            // Move the file to the public/uploads/department directory
            $path = 'uploads/department/';
            $file->move(public_path($path), $filename); // Ensure it's moved to the public directory
        }
    
        // Save the relative path (uploads/department/filename.jpg) to the database
        Department::create([
            'name' => $request->name,
            'color' => $request->color,
            'photo' => $path . $filename, // This is stored as uploads/department/filename.jpg
        ]);
    
        return response()->json(['message' => "Added Successfully"]);
    }
    
    
    
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'max:10|string',
            'color' => 'max:25|string',
            'photo' => 'required|mimes:png,jpg,jpeg,webp',
        ]);


        $data = Department::findOrFail($id);
        if ($request->has('photo')) {

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/departments';
            $file->move($path, $filename);
        }
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

    public function displaycounts($department, $count, $logic, $operator)
    {
        $data = Department::where('name', $department)->first();

        if (!$data) {
            return response()->json(['message' => 'No data found'], 404);
        }

        if ($logic == 'reserved') {
            if ($operator == 'add') {
                $data->reserved += $count;
                $data->save();
                return response()->json(["message" => "Reserved Count Increased for {$department}"], 200);
            } elseif ($operator == 'subtract') {
                $data->reserved -= $count;
                $data->save();
                return response()->json(["message" => "Reserved Count Decreased for {$department}"], 200);
            }
        }

        if ($logic == 'claim') {
            if ($operator == 'add') {
                $data->claim += $count;
                $data->save();
                return response()->json(["message" => "Claimed Count Increased for {$department}"], 200);
            } elseif ($operator == 'subtract') {
                $data->claim -= $count;
                $data->save();
                return response()->json(["message" => "Claimed Count Decreased for {$department}"], 200);
            }
        }

        if ($logic == 'complete') {
            if ($operator == 'add') {
                $data->completed += $count;
                $data->save();
                return response()->json(["message" => "Completed Count Increased for {$department}"], 200);
            } elseif ($operator == 'subtract') {
                $data->completed -= $count;
                $data->save();
                return response()->json(["message" => "Completed Count Decreased for {$department}"], 200);
            }
        }

        $data->save();

        return response()->json(["message" => "Data updated successfully"], 200);
    }
}
