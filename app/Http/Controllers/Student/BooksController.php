<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Books;
class BooksController extends Controller
{
    public function index(){
        $books = Books::all();
        return response() -> json(['books' => $books]);
    }

    public function store(Request $request){  
        return Books::create($request->all());
     }

     public function show($bookCollection_id){
        $books = Books::where('bookCollection_id', $bookCollection_id)->get();
        
        if($books->isEmpty()) {
            return response()->json(['message' => 'No Books found for the specified Collection'], 404);
        }

        return response()->json(['books' => $books]);
     } 

     public function update(Request $request, $id){
        $books = Books::find($id);
        
        if (!$books) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        
        $validatedData = $request->validate([
            'hasBook' => 'string|max:20',
        ]);
        
        $books->update($validatedData);
        return response()->json(['message' => 'Book updated successfully', 'books' => $books], 200);
    }
     public function destroy($id){

     }
}
