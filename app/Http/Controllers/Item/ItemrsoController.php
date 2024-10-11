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

   }

   public function show($Course){
      $data = Itemrso::where('Course', $Course)->get();
      return response()->json($data);
   } 

   public function edit($id){

   }

   public function update(Request $request, $id){

   }
   public function destroy($id){

   }

   public function reduceStock($count, $department, $course, $gender, $type, $body, $size)
   {
      try {
         $item = Itemrso::where('Course', $course)
               ->where('Department', $department)
               ->where('Gender', $gender)
               ->where('Type', $type)
               ->where('Body', $body)
               ->where('Size', $size)
               ->first();
   
         if (!$item) {
               return response()->json(['message' => 'Item not found'], 404);
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
