<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item\ItemBook;
class ItemBookController extends Controller
{
    public function index(){
        
    }

    public function store(Request $request){
      $request->validate([
          'Department' => 'required|max:50|string',
          'BookName' => 'required|max:50|string',
          'SubjectCode' => 'required|max:50|string',
          'SubjectDesc' => 'required|max:50|string',
          'Stock' => 'required|max:10|string',
      ]);
      ItemBook::create([
          'Department' => $request->Department,
          'BookName' => $request->BookName,
          'SubjectCode' => $request->SubjectCode,
          'SubjectDesc' => $request->SubjectDesc,
          'Stock' => $request->Stock,
      ]);
      return response()->json(['message' => "Added Succesfully"]);
  }

     public function show($Department){
        $data = ItemBook::where('Department', $Department)->get();
        return response()->json($data);
     } 

     public function edit($id){

     }

     public function update(Request $request, $id){

     }
     public function destroy($id){

     }
}
