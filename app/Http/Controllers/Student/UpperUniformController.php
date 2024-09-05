<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\upperUniform;
class UpperUniformController extends Controller
{
    public function index(){
        $upperuniform = upperUniform::all();
        return response() -> json(['upperuniform' => $upperuniform]);
    }

    public function store(Request $request){  
        $validatedData = $request->validate([
            'UpperSize' => 'string|max:10',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
            'stubag_id' => 'required|integer',
        ]);
    
        $existingUpperUniform = upperUniform::where('stubag_id', $validatedData['stubag_id'])->first();
    
        if ($existingUpperUniform) {
            return response()->json(['message' => 'Upper Uniform with this stubag_id already exists'], 409);
        }
    
        $upperUniform = upperUniform::create($validatedData);
    
        return response()->json(['message' => 'Upper Uniform created successfully', 'upperUniform' => $upperUniform], 201);
    }
    

     public function show($stubag_id){
        $upperuniform = upperUniform::where('stubag_id', $stubag_id)->get();
        
        if($upperuniform->isEmpty()) {
            return response()->json(['message' => 'No Upper Uniform found for the specified Notification'], 404);
        }

        return response()->json(['upperuniform' => $upperuniform]);
     } 

     public function update(Request $request, $id) {
        $upperuniform = upperUniform::find($id);
        
        if (!$upperuniform) {
            return response()->json(['message' => 'Upper Uniform not found'], 404);
        }
        
        $validatedData = $request->validate([
            'UpperSize' => 'string|max:2',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
        ]);
        
        $upperuniform->update($validatedData);
        return response()->json(['message' => 'Upper Uniform updated successfully', 'upperuniform' => $upperuniform], 200);
    }
    public function destroy($id) {
        $upperuniform = upperUniform::find($id);
    
        if (!$upperuniform) {
            return response()->json(['message' => 'Upper Uniform not found'], 404);
        }

        $upperuniform->delete();

        return response()->json(['message' => 'Upper Uniform deleted successfully'], 200);
    }
}
