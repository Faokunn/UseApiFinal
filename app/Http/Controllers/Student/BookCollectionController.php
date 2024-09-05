<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Student\BooksController;
use App\Models\Student\BookCollection;

class BookCollectionController extends Controller
{
    public function index(){
        $bookcollection = BookCollection::with('books')->get();
        return response() -> json(['bookcollection' => $bookcollection]);
    }

    public function store(Request $request){ 
        if($request->has('books')){
            $bookcollection->books()->createMany($request->input('books'));
        }
     }

     public function show($stu_id){
        $bookcollection = BookCollection::where('stu_id', $stu_id)->get();
        
        if($bookcollection->isEmpty()) {
            return response()->json(['message' => 'No Book Collection found for the specified Notification'], 404);
        }

        return response()->json(['bookcollection' => $bookcollection]);
     } 

     public function update(Request $request, $id){
        $bookcollection = BookCollection::find($id);
        
        if (!$bookcollection) {
            return response()->json(['message' => 'Book Collection not found'], 404);
        }
        
        $validatedData = $request->validate([
            'Status' => 'string|max:10',
        ]);
        
        $bookcollection->update($validatedData);
        return response()->json(['message' => 'Book Collection updated successfully', 'bookcollection' => $bookcollection], 200);
     }
     public function destroy($id){

     }
}
