<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\rso;
class RsoController extends Controller
{
    public function index(){
        $rso = rso::all();
        return response() -> json(['rso' => $rso]);
    }

    public function store(Request $request) {  
        $validatedData = $request->validate([
            'stubag_id' => 'required|integer',
            'RsoSize' => 'string|max:2',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
        ]);
    
        $existingRso = rso::where('stubag_id', $validatedData['stubag_id'])->first();
    
        if ($existingRso) {
            return response()->json(['message' => 'RSO with this stubag_id already exists'], 409);
        }
    
        $rso = rso::create($validatedData);
    
        return response()->json(['message' => 'RSO created successfully', 'rso' => $rso], 201);
    }
    

     public function show($stubag_id){
        $rso = rso::where('stubag_id', $stubag_id)->get();
        
        if($rso->isEmpty()) {
            return response()->json(['message' => 'No RSO found for the specified Notification'], 404);
        }

        return response()->json(['rso' => $rso]);
     } 

     public function update(Request $request, $id) {
        $rso = rso::find($id);
        
        if (!$rso) {
            return response()->json(['message' => 'RSO not found'], 404);
        }
        
        $validatedData = $request->validate([
            'RsoSize' => 'string|max:2',
            'Status' => 'string|max:10',
            'code' => 'nullable|string|max:5',
        ]);
        
        $rso->update($validatedData);
        return response()->json(['message' => 'RSO updated successfully', 'rso' => $rso], 200);
    }
    public function destroy($id) {
        $rso = Rso::find($id);
    
        if (!$rso) {
            return response()->json(['message' => 'RSO not found'], 404);
        }

        $rso->delete();

        return response()->json(['message' => 'RSO deleted successfully'], 200);
    }
}
