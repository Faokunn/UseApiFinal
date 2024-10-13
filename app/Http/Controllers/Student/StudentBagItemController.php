<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\StudentBagItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Item\ItemrsoController;
use App\Http\Controllers\Student\MailsController;
use App\Http\Controllers\Admin\DepartmentController;

class StudentBagItemController extends Controller
{
    public function index()
    {
        $items = StudentBagItem::with('studentBag')->get();
        return response()->json(['items' => $items]);
    }

    public function generateCode(){
        $code = mt_rand(10000, 99999);
        $existingCode = StudentBagItem::where('code', $code)->first();

        if ($existingCode) {
            return $this->generateCode();
        }

        return $code;
    }

    public function store(Request $request)
    {
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

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
            'shift' => "nullable|string|max:255",
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

    public function requestitem(Request $request,$stocks)
    {
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemrsoController();
        $departmentController = new DepartmentController();
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
            'shift' => "nullable|string|max:255",
            'stubag_id' => 'required|integer|exists:student_bags,id',
            'dateReceived' => 'nullable|date',
            'reservationNumber' => 'nullable|integer|exists',
        ]);

        if (empty($validatedData['code'])) {
            $validatedData['code'] = $this->generateCode();
        }

        if($validatedData['Status'] == 'Request'){
            if($stocks == 0){
                $highestReservation = StudentBagItem::
                where('Type', $validatedData['Type'])
                ->where('Size', $validatedData['Size'])
                ->where('Course', $validatedData['Course'])
                ->where('Body', $validatedData['Body'])
                ->where('Gender', $validatedData['Gender'])
                ->max('reservationNumber');
    
                $validatedData['Status'] = 'Reserved';
                $validatedData['reservationNumber'] = ++$highestReservation;
                $requestController->reduceStock(1, $validatedData['Course'], $validatedData['Gender'], $validatedData['Type'], $validatedData['Body'], $validatedData['Size'], 'reserved');
                $responseClaim = $departmentController->displaycounts($validatedData['Department'], 1, 'reserved', 'add');
                if ($responseClaim->getStatusCode() !== 200) {
                    return $responseClaim; // Return error response from displaycounts if not successful
                }
            }
            else{
                if($validatedData['shift'] == 'A'){
                    $validatedData['claiming_schedule'] = "$scheduleA[0] to $scheduleA[2]";
                }
                elseif($validatedData['shift'] == 'B'){
                    $validatedData['claiming_schedule'] = "$scheduleB[0] to $scheduleB[2]";
                }
                else{
                    return response()->json(['message' => 'Department not found in either shift'], status: 400);
                }
                $validatedData['Status'] = 'Claim';
                $validatedData['reservationNumber'] = null; 
                $requestController->reduceStock(1, $validatedData['Course'], $validatedData['Gender'], $validatedData['Type'], $validatedData['Body'], $validatedData['Size'], 'stock');
                $responseClaim = $departmentController->displaycounts($validatedData['Department'], 1, 'claim', 'add');
                if ($responseClaim->getStatusCode() !== 200) {
                    return $responseClaim; 
                }
            }
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
        if($status == 'All') {
            $items = StudentBagItem::where('stubag_id', $stubag_id)
            ->get();

            return response()->json(['items' => $items]);
        }
        else{
            $items = StudentBagItem::where('stubag_id', $stubag_id)
            ->where('Status', $status)
            ->get();
            return response()->json(['items' => $items]);

        }

    }

    public function codeShow($code)
    {
        $item = StudentBagItem::where('code', $code)->first();

        if(!$item){
            return response()->json(['message' => 'Item not found'], 404);
        }

        if($item->Status != 'Claim'){
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

    public function changeStatus($id, $status){
        $item = StudentBagItem::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday",];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemrsoController();
        $departmentController = new DepartmentController();
        if(!$item){
            return response()->json(['Student Bag item not found'], status: 400);
        }
        $department = $item->Department;
        $course = $item->Course;
        $gender = $item->Gender;
        $type = $item->Type;
        $body = $item->Body;
        $size = $item->Size;
        $stuId = $item->stubag_id;
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
            $departmentController->displaycounts($items->Department, 1, 'reserved', 'add');
            
            $requestController->reduceStock(1,  $course, $gender, $type, $body, $size, 'reserved');
            $item->save();
        }
        

        if($status == 'Claim'){
            $items = StudentBagItem::find($id)->first();
            if($item->shift  == "A"){
                $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            }
            elseif($item->shift  == "B"){
                $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            }
            else{
                return response()->json(['message' => 'Department not found in either shift'], status: 400);
            }
            $item->status = $status;
            $item->reservationNumber = null;
            $departmentController->displaycounts($items->Department, 1, 'claim', 'add');
            $departmentController->displaycounts($items->Department, 1, 'reserved', 'subtract');
        
        }

        if($status == 'Complete'){
            $items = StudentBagItem::find($id)->first();
            $item->dateReceived = now();
            $item->status = $status;
            $item->claiming_schedule = null;
            $item->code = null;
            $requestController->reduceStock(1,  $course, $gender, $type, $body, $size,'stock');
            $departmentController->displaycounts($items->Department, 1, 'complete', 'add');
            $departmentController->displaycounts($items->Department, 1, 'claim', 'subtract');
        }
        
        $item->save();

        return response()->json(['message' => 'Status changed successfully'], status: 200);
    }

    public function changeRequestStatus($id, $status)
    {
        $item = StudentBagItem::find($id);
        $scheduleA = ["Monday", "Tuesday", "Wednesday"];
        $scheduleB = ["Thursday", "Friday", "Saturday"];

        if (!$item) {
            return response()->json(['message' => 'Student Bag item not found'], 400);
        }
        $departmentController = new DepartmentController();
        $requestController = new ItemrsoController();
        $mailController = new MailsController();

        $department = $item->Department;
        $course = $item->Course;
        $gender = $item->Gender;
        $type = $item->Type;
        $body = $item->Body;
        $size = $item->Size;
        $stuId = $item->stubag_id;

        // Get the stock using specificUniform
        $response = $requestController->specificUniform($department, $course, $gender, $type, $body, $size);
        if ($response->getStatusCode() == 200) {
            $stockData = json_decode($response->getContent(), true);
            $stocks = $stockData['stock']; 
        } else {
            return $response;
        }
        $description = $stocks == 0
        ? "The item {$item->code} you\'ve requested is now RESERVED."
        : "The item {$item->code} you\'ve requested is now ready to be CLAIMED.";
    
        
        $mailController->createdata([
            'description' => $description,
            'time' => now(),
            'isDone' => false,
            'redirectTo' => '',
            'notificationId' => $stuId
        ]);
        if ($status == 'Request') {
            if ($stocks == 0) {
                $highestReservation = StudentBagItem::where('Type', $item->Type)
                    ->where('Size', $item->Size)
                    ->where('Course', $item->Course)
                    ->where('Body', $item->Body)
                    ->where('Gender', $item->Gender)
                    ->max('reservationNumber');

                $item->Status = 'Reserved';
                $item->reservationNumber = ++$highestReservation;
                $responseClaim = $departmentController->displaycounts($item->Department, 1, 'reserved', 'add');
                if ($responseClaim->getStatusCode() !== 200) {
                    return $responseClaim; // Return error response from displaycounts if not successful
                }
                $requestController->reduceStock(1,  $course, $gender, $type, $body, $size, 'reserved');
            } else {
                if ($item->shift == "A") {
                    $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
                } elseif ($item->shift == "B") {
                    $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
                } else {
                    return response()->json(['message' => 'Department not found in either shift'], 400);
                }
                $item->Status = "Claim";
                $item->reservationNumber = null;
                $responseClaim = $departmentController->displaycounts($item->Department, 1, 'claim', 'add');
                if ($responseClaim->getStatusCode() !== 200) {
                    return $responseClaim; // Return error response from displaycounts if not successful
                }
                $responseCClaim = $requestController->reduceStock(1,  $course, $gender, $type, $body, $size,'stock');
                if ($responseCClaim->getStatusCode() !== 200) {
                    return $responseClaim; // Return error response from displaycounts if not successful
                }
            }
        }

        $item->save();

        return response()->json(['message' => 'Status changed successfully'], 200);
    }
    public function reservedItemFirst($count, $course, $gender, $type, $body, $size){
        $scheduleA = ["Monday", "Tuesday", "Wednesday"];
        $scheduleB = ["Thursday", "Friday", "Saturday"];
        $requestController = new ItemrsoController();
        $departmentController = new DepartmentController();
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
            if($item->shift  == "A"){
                $item->claiming_schedule = "$scheduleA[0] to $scheduleA[2]";
            }
            elseif($item->shift  == "B"){
                $item->claiming_schedule = "$scheduleB[0] to $scheduleB[2]";
            } else {
                return response()->json(['message' => 'Department not found in either shift'], 400);
            }

            $responseClaim = $departmentController->displaycounts($item->Department, 1, 'claim', 'add');
            if ($responseClaim->getStatusCode() !== 200) {
                return $responseClaim; // Return error response from displaycounts if not successful
            }
            $responseClaim = $departmentController->displaycounts($item->Department, 1, 'reserved', 'subtract');
            if ($responseClaim->getStatusCode() !== 200) {
                return $responseClaim; // Return error response from displaycounts if not successful
            }
            $item->status = 'Claim';
            $item->reservationNumber = null;
            
            if (!$item->save()) {
                return response()->json(['message' => 'Failed to update record for book ID: ' . $item->id], 500);
            } else {
            }
        }
        $requestController->reduceStock($count, $course, $gender, $type, $body, $size,'reservedFirst');
        return response()->json(['message' => 'Reserved Items Successfully Prioritized'], status: 200);
        
    }

    public function showAllItems($stubag_id, $status){

        if($status == 'All') {
            $items = StudentBagItem::where('stubag_id', $stubag_id)
            ->get();

            return response()->json(['items' => $items]);
        }
        else{
            $items = StudentBagItem::where('stubag_id', $stubag_id)
            ->where('status', $status)
            ->get();
            return response()->json(['items' => $items]);
        }
        
    }

    public function completedItems(){
        $items = StudentBagItem::where('Status', "Complete")->get();
        return response()->json(['items' => $items], 200);
    }
}
