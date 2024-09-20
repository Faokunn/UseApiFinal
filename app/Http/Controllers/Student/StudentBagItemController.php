<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentBagItem;
use Illuminate\Http\Request;

class StudentBagItemController extends Controller
{
    public function index()
    {
        $items = StudentBagItem::with('studentBag')->get();
        return response()->json(['items' => $items]);
    }

    public function generateCode(){
        $code = mt_rand(00000, 99999);
        $existingCode = StudentBagItem::where('code', $code)->first();

        if ($existingCode) {
            return $this->generateCode();
        }

        return $code;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Department' => 'nullable|string|max:255',
            'Course' => 'nullable|string|max:255',
            'Gender' => 'nullable|string|max:50',
            'Type' => 'required|string|max:255',
            'Body' => 'required|string|max:255',
            'Size' => 'required|string|max:255',
            'Status' => 'required|string|max:255',
            'code' => 'nullable|string|max:5',
            'claiming_schedule' => 'nullable|string|max:255',
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date'
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }
        
        $existingItem = StudentBagItem::where('Type', $validatedData['Type'])
            ->where('Body', $validatedData['Body'])
            ->first();

        if ($existingItem) {
            return response()->json(['message' => 'Student Bag Item with this Type and Body already exists'], 409);
        }

        $item = StudentBagItem::create($validatedData);

        return response()->json(['message' => 'Student Bag Item created successfully', 'item' => $item], 201);
    }

    public function show($stubag_id, $status)
    {
        $items = StudentBagItem::where('stubag_id', $stubag_id)
            ->where('Status', $status)
            ->get();
        return response()->json(['items' => $items]);
    }

    public function update(Request $request, $id)
    {
        $item = StudentBagItem::find($id);

        if (!$item) {
            return response()->json(['message' => 'Student Bag Item not found'], 404);
        }

        $validatedData = $request->validate([
            'Department' => 'nullable|string|max:255',
            'Course' => 'nullable|string|max:255',
            'Gender' => 'nullable|string|max:50', 
            'Type' => 'nullable|string|max:255',
            'Body' => 'nullable|string|max:255',
            'Size' => 'nullable|string|max:255',
            'Status' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
            'claiming_schedule' => 'nullable|string|max:255', 
            'stubag_id' => 'nullable|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date'
        ]);

        $item->update($validatedData);

        return response()->json(['message' => 'Student Bag Item updated successfully', 'item' => $item], 200);
    }

    public function destroy($id)
    {
        $item = StudentBagItem::find($id);

        if (!$item) {
            return response()->json(['message' => 'Student Bag Item not found'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Student Bag Item deleted successfully'], 200);
    }

    public function changeStatus($id, $status){
        $item = StudentBagItem::find($id);

        if(!$item){
            return response()->json(['Student Bag item not found'], status: 400);
        }

        $item->Status = $status;
        $item->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }
}
