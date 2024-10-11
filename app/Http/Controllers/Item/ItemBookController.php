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

   }

   // DAGDAG / GINALAW NI LANCE
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

   public function reduceStock($count, $department, $bookname, $subcode, $subdesc)
   {
      try {
         $item = ItemBook::where('BookName', $bookname)
               ->where('Department', $department)
               ->where('SubjectCode', $subcode)
               ->where('SubjectDesc', $subdesc)
               ->first();
   
         if (!$item) {
               return response()->json(['message' => 'Book not found'], 404);
         }
   
         if ($count <= 0) {
               return response()->json(['message' => 'Invalid stock reduction count'], 400);
         }
   
         if ($item->Stock < $count) {
               return response()->json(['message' => 'Insufficient stock'], 400);
         }

         $item->Stock -= $count;
         $item->save();
   
          return response()->json(['message' => 'Stock reduced successfully'], 200);
      } catch (\Exception $e) {
         return response()->json(['message' => 'Error reducing stock: ' . $e->getMessage()], 500);
      }
   }
}
