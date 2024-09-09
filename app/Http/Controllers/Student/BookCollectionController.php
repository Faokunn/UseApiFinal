<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student\BookCollection;

class BookCollectionController extends Controller
{
    public function index()
    {
        $bookCollections = BookCollection::all();
        return response()->json(['bookCollections' => $bookCollections]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'BookName' => 'nullable|string|max:255',
            'SubjectCode' => 'nullable|string|max:255',
            'SubjectDesc' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'status' => 'required|string|max:255',
            'claiming_schedule' => 'nullable|string|max:255',
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
        ]);

        $bookCollection = BookCollection::create($validatedData);

        return response()->json(['message' => 'Book Collection created successfully', 'bookCollection' => $bookCollection], 201);
    }
    public function show($stubag_id, $status)
    {
        // Find book collections based on stubag_id and status
        $bookCollections = BookCollection::where('stubag_id', $stubag_id)
            ->where('Status', $status)
            ->get();
    
        if ($bookCollections->isEmpty()) {
            // Return a 404 response if no book collections are found
            return response()->json(['message' => 'No Book Collections found for the specified criteria'], 404);
        }
    
        // Return the book collections as JSON
        return response()->json(['bookCollections' => $bookCollections]);
    }
    


    public function update(Request $request, $id)
    {
        $bookCollection = BookCollection::find($id);

        if (!$bookCollection) {
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        $validatedData = $request->validate([
            'BookName' => 'nullable|string|max:255',
            'SubjectCode' => 'nullable|string|max:255',
            'SubjectDesc' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'status' => 'nullable|string|max:255',
            'claiming_schedule' => 'nullable|string|max:255',
            'stubag_id' => 'nullable|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
        ]);

        $bookCollection->update($validatedData);

        return response()->json(['message' => 'Book Collection updated successfully', 'bookCollection' => $bookCollection], 200);
    }

    public function destroy($id)
    {
        $bookCollection = BookCollection::find($id);

        if (!$bookCollection) {
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        $bookCollection->delete();

        return response()->json(['message' => 'Book Collection deleted successfully'], 200);
    }
}
