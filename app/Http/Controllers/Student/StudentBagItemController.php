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
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }
        
        $existingItem = StudentBagItem::where('Type', $validatedData['Type'])
            ->where('Body', $validatedData['Body'])
            ->where('stubag_id', $validatedData['stubag_id'])
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

    public function codeShow($code)
    {
        $item = StudentBagItem::where('code', $code)->first();

        if(!$item){
            return response()->json(['message' => 'Item not found'], 404);
        }

        if($item->Status != 'claim'){
            return response()->json(['message' => 'Item is not ready for claiming'], 409);
        }
        else{
            return response()->json(['items' => $item], 200);
        }
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
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',

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

    public function changeStatus($id, $status, $stocks){
        $item = StudentBagItem::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

        $shiftA = ["CMA"];
        $shiftB = ["CITE"];

        if(!$item){
            return response()->json(['Student Bag item not found'], status: 400);
        }

        if($status == 'Reserved'){
            $items = StudentBagItem::find($id)->first();
            $highestReservation = StudentBagItem::
            where('Type', $item->Type)
            ->where('Size', $item->Size)
            ->where('Course', $item->Course)
            ->where('Body', $item->Body)
            ->where('Gender', $item->Gender)
            ->max('reservationNumber');

            $item->status = 'Reserved';
            $item->reservationNumber = ++$highestReservation;
            $item->save();
        }
        

        if($status == 'Claim'){
            if(in_array($item->Department, $shiftA)){
                $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            }
            elseif(in_array($item->Department, $shiftB)){
                $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            }
            else{
                return response()->json(['message' => 'Department not found in either shift'], status: 400);
            }
            $item->status = $status;
            $item->reservationNumber = null;
        }

        if($status == 'Complete'){
            $item->dateReceived = now();
            $item->status = $status;
            $item->claiming_schedule = null;
            $item->code = null;
        }
        if($status == 'Request'){
            if($stocks == 0){
                $items = StudentBagItem::find($id)->first();
                $highestReservation = StudentBagItem::
                where('Type', $item->Type)
                ->where('Size', $item->Size)
                ->where('Course', $item->Course)
                ->where('Body', $item->Body)
                ->where('Gender', $item->Gender)
                ->max('reservationNumber');
    
                $item->status = 'Reserved';
                $item->reservationNumber = ++$highestReservation;
                $item->save();
            }
            else{
                if(in_array($item->Department, $shiftA)){
                    $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
                }
                elseif(in_array($item->Department, $shiftB)){
                    $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
                }
                else{
                    return response()->json(['message' => 'Department not found in either shift'], status: 400);
                }
                $item->status = $status;
                $item->reservationNumber = null;
            }
        }
        
        $item->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }
    public function reservedItemFirst($count, $course, $gender, $type, $body, $size){
        $scheduleA = ["Monday", "Tuesday", "Wednesday"];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
    
        $shiftA = ["CMA"];
        $shiftB = ["CITE"];
        $items = StudentBagItem::where('Course', $course) 
        ->where('Gender', $gender)
        ->where('Type', $type)
        ->where('Body', $body)
        ->where('Size', $size)       
        ->whereNotNull('reservationNumber')
        ->orderBy('reservationNumber', 'asc')
        ->take($count)
        ->get();

        foreach($items as $item){
            if (in_array($item->Department, $shiftA)) {
                $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            } elseif (in_array($item->Department, $shiftB)) {
                $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            } else {
                return response()->json(['message' => 'Department not found in either shift'], 400);
            }
    
            $item->status = 'Claim';
            $item->reservationNumber = null;
    
            if (!$item->save()) {
                return response()->json(['message' => 'Failed to update record for book ID: ' . $item->id], 500);
            } else {
            }
        }
        return response()->json(['message' => 'Reserved Items Successfully Prioritized'], status: 200);
        
    }

    public function showAllItems($stubag_id){
        $items = StudentBagItem::where('stubag_id', $stubag_id)->get();
        return response()->json(['items' => $items]);
    }
}
