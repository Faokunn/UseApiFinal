<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\lowerUniform;
class LowerUniformController extends Controller
{
    public function index(){
        $loweruniform = lowerUniform::all();
        return response() -> json(['loweruniform' => $loweruniform]);
    }

    public function store(Request $request){  
        $validatedData = $request->validate([
            'LowerSize' => 'string|max:10',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
            'stubag_id' => 'required|integer',
        ]);
    
        $existingLowerUniform = lowerUniform::where('stubag_id', $validatedData['stubag_id'])->first();
    
        if ($existingLowerUniform) {
            return response()->json(['message' => 'Lower Uniform with this stubag_id already exists'], 409);
        }
    
        $lowerUniform = lowerUniform::create($validatedData);
    
        return response()->json(['message' => 'Lower Uniform created successfully', 'lowerUniform' => $lowerUniform], 201);
    }
    

     public function show($stubag_id){
        $loweruniform = lowerUniform::where('stubag_id', $stubag_id)->get();
        
        if($loweruniform->isEmpty()) {
            return response()->json(['message' => 'No Lower Uniform found for the specified Notification'], 404);
        }

        return response()->json(['loweruniform' => $loweruniform]);
     } 

     public function update(Request $request, $id) {
        $loweruniform = lowerUniform::find($id);
        
        if (!$loweruniform) {
            return response()->json(['message' => 'Lower Uniform not found'], 404);
        }
        
        $validatedData = $request->validate([
            'LowerSize' => 'string|max:2',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
        ]);
        
        $loweruniform->update($validatedData);
        return response()->json(['message' => 'Lower Uniform updated successfully', 'loweruniform' => $loweruniform], 200);
    }
    public function destroy($id) {
        $loweruniform = lowerUniform::find($id);
    
        if (!$loweruniform) {
            return response()->json(['message' => 'Lower Uniform not found'], 404);
        }

        $loweruniform->delete();

        return response()->json(['message' => 'Lower Uniform deleted successfully'], 200);
    }
}
