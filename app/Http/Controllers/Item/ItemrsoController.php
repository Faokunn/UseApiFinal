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
}
