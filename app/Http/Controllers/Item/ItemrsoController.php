<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item\Itemrso;
class ItemrsoController extends Controller
{
    public function index(){
        
    }

    public function store(Request $request){
      $request->validate([
          'Department' => 'required|max:50|string',
          'Course' => 'required|max:50|string',
          'Gender' => 'required|max:50|string',
          'Type' => 'required|max:50|string',
          'Body' => 'required|max:50|string',
          'Size' => 'required|max:50|string',
          'Stock' => 'required|max:10|string',
      ]);
      Itemrso::create([
          'Department' => $request->Department,
          'Course' => $request->Course,
          'Gender' => $request->Gender,
          'Type' => $request->Type,
          'Body' => $request->Body,
          'Size' => $request->Size,
          'Stock' => $request->Stock,
      ]);
      return response()->json(['message' => "Added Succesfully"]);
  }

     public function show($Course){
        $data = Itemrso::where('Course', $Course)->get();
        return response()->json($data);
     } 

     public function edit($id){

     }

     public function update(Request $request, $id) {
        $request->validate([
            'Stock' => 'required|max:10|string',
        ]);
        $data = Itemrso::findOrFail($id);
        $data->update([
            'Stock' => $request->Stock,
        ]);
    
        return response()->json(['message' => "Updated Successfully"]);
    }
     public function destroy($id){
        $data = Itemrso::find($id);
        $data -> delete();
        return response()->json(['message' => "Deleted Succesfully"]);
      }
}
