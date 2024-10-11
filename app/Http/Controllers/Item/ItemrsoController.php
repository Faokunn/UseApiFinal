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

   public function reduceStock($count, $department, $course, $gender, $type, $body, $size,$logic)
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
         if($logic == 'stock'){
            if ($count <= 0) {
               return response()->json(['message' => 'Invalid stock reduction count'], 400);
            }
      
            if ($item->Stock < $count) {
                  return response()->json(['message' => 'Insufficient stock'], 400);
            }

            $item->Stock -= $count;
            $item->save();
      
            return response()->json(['message' => 'Stock reduced successfully'], 200);
         }else if($logic == 'reserved'){  
            $item->Reserved += $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved increased successfully'], 200);
         }else if($logic == 'claim'){
            $item->Reserved -= $count;
            $item->save();
      
            return response()->json(['message' => 'Reserved reduced successfully'], 200);
         }else if($logic == 'reservedFirst'){
            $reservedReduction = min($count, $item->Reserved);
            $item->Reserved -= $reservedReduction;
            $remainingReduction = $count - $reservedReduction;
            $item->Stock += $remainingReduction;
            $item->save();
         }
         
      } catch (\Exception $e) {
         return response()->json(['message' => 'Error reducing stock: ' . $e->getMessage()], 500);
      }
   }

   public function specificUniform($department, $course, $gender, $type, $body, $size){
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

      return response()->json(['stock' => $item->Stock], 200);
   }
   
}
