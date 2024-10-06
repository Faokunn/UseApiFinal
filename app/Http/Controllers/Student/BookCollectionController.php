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

    public function generateCode(){
        $code = mt_rand(00000, 99999);
        $existingCode = BookCollection::where('code', $code)->first();

        if ($existingCode) {
            return $this->generateCode();
        }

        return $code;
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
            'reservationNumber' => 'nullable|integer|exists',
            'Department' => 'nullable|string|max:255',
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }

        $existingBook = BookCollection::where('BookName', $validatedData['BookName'])
        ->where('stubag_id', $validatedData['stubag_id'])->first();

        if ($existingBook) {
            return response()->json(['message' => 'Book already exists'], 409);
        }

        $bookCollection = BookCollection::create($validatedData);

        return response()->json(['message' => 'Book Collection created successfully', 'bookCollection' => $bookCollection], 201);
    }
    public function show($stubag_id, $status)
    {
        // Find book collections based on stubag_id and status
        $bookCollections = BookCollection::where('stubag_id', $stubag_id)
            ->where('Status', $status)
            ->get();
        // Return the book collections as JSON
        return response()->json(['bookCollections' => $bookCollections]);
    }

    public function codeShow($code)
    {
        $bookCollections = BookCollection::where('code', $code)->first();

        if(!$bookCollections){
            return response()->json(['message' => 'Book Collection not found'], 404);
        }

        if($bookCollections->Status != 'Claim'){
            return response()->json(['message' => 'Book is not ready for claiming'], 409);
        }
        else{
            return response()->json(['bookCollections' => $bookCollections], 200);
        }
        
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
            'reservationNumber' => 'nullable|integer|exists',
            'Department' => 'nullable|string|max:255',
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

    public function changeStatus($id, $status){
        $bookCollection = BookCollection::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

        $shiftA = ["CMA"];
        $shiftB = ["CITE"];

        if(!$bookCollection){
            return response()->json(['Book not found'], status: 400);
        }

        if($status == 'Reserved'){
            $highestReservation = BookCollection::
            where('BookName', $bookCollection->BookName)
            ->max('reservationNumber');

            $bookCollection->status = 'Reserved';
            $bookCollection->reservationNumber = ++$highestReservation;
            $bookCollection->save();
        }

        if($status == 'Claim'){
            if(in_array($bookCollection->Department, $shiftA)){
                $bookCollection->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            }
            elseif(in_array($bookCollection->Department, $shiftB)){
                $bookCollection->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            }
            else{
                return response()->json(['message' => 'Department not found in either shift'], status: 400);
            }
            $bookCollection->status = $status;
            $bookCollection->reservationNumber = null;
        }

        if($status == 'Complete'){
            $bookCollection->dateReceived = now();
            $bookCollection->status = $status;
            $bookCollection->claiming_schedule = null;
            $bookCollection->code = null;
        }
        if($status == 'Request'){
            $bookCollection->status = $status;
            $bookCollection->reservationNumber = null;
            $bookCollection->claiming_schedule = null;
        }
        $bookCollection->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }
    public function reservedBookFirst($count, $identifier) {
        $scheduleA = ["Monday", "Tuesday", "Wednesday"];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
    
        $shiftA = ["CMA"];
        $shiftB = ["CITE"];
    
        $bookCollection = BookCollection::where('BookName', $identifier)
            ->whereNotNull('reservationNumber')
            ->orderBy('reservationNumber', 'asc')
            ->take($count)
            ->get();

        foreach ($bookCollection as $books) {
            if (in_array($books->Department, $shiftA)) {
                $books->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            } elseif (in_array($books->Department, $shiftB)) {
                $books->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            } else {
                return response()->json(['message' => 'Department not found in either shift'], 400);
            }
    
            $books->status = 'Claim';
            $books->reservationNumber = null;
    
            if (!$books->save()) {
                return response()->json(['message' => 'Failed to update record for book ID: ' . $books->id], 500);
            } else {
            }
        }
        return response()->json(['message' => 'Reserved Books Successfully Prioritized'], 200);
    }
    
    public function showAllBooks($stubag_id){
        $bookCollections = BookCollection::where('stubag_id', $stubag_id)->get();
        return response()->json(['bookCollections' => $bookCollections]);
    }
}
