<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\StudentBag;

class StudentBagController extends Controller
{
    public function index()
    {
        $studentbags = StudentBag::with('studentBagItems', 'bookCollection')->get();
        return response()->json(['studentbags' => $studentbags]);
    }

    public function store(Request $request)
    {
    }

    public function show($stu_id)
    {
        $studentbag = StudentBag::where('stu_id', $stu_id)
            ->with('studentBagItems', 'bookCollection')
            ->first();

        if (!$studentbag) {
            return response()->json(['message' => 'No Student Bag found for the specified ID'], 404);
        }

        return response()->json(['studentbag' => $studentbag]);
    }

    public function showStatus($stu_id, $status)
    {
        $studentbag = StudentBag::where('stu_id', $stu_id)
            ->with(['studentBagItems' => function ($query) use ($status) {
                $query->where('Status', $status);
            }, 'bookCollection'])
            ->first();

        if (!$studentbag) {
            return response()->json(['message' => 'No Student Bag found for the specified ID'], 404);
        }

        $studentbag->studentBagItems = $studentbag->studentBagItems->filter(function ($item) use ($status) {
            return $item->Status === $status;
        });

        if ($studentbag->studentBagItems->isEmpty()) {
            $studentbag->studentBagItems = [];
        }

        return response()->json(['studentbag' => $studentbag]);
    }

    public function destroy($id)
    {
        $studentbag = StudentBag::find($id);

        if (!$studentbag) {
            return response()->json(['message' => 'Student Bag not found'], 404);
        }

        $studentbag->delete();

        return response()->json(['message' => 'Student Bag deleted successfully'], 200);
    }
}

