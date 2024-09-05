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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Department' => 'nullable|string|max:255',
            'Type' => 'required|string|max:255',
            'Body' => 'required|string|max:255',
            'Size' => 'required|string|max:255',
            'Status' => 'required|string|max:255',
            'code' => 'nullable|string|max:5',
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date'
        ]);

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

        if ($items->isEmpty()) {
            return response()->json(['message' => 'No Student Bag Items found for the specified criteria'], 404);
        }

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
            'Type' => 'nullable|string|max:255',
            'Body' => 'nullable|string|max:255',
            'Size' => 'nullable|string|max:255',
            'Status' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:5',
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
}
