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
}
