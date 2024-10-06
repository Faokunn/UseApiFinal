<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Notification;
class NotificationController extends Controller
{
    public function index(){
        $notification = Notification::with('mail')->get();
        return response() -> json(['notification' => $notification]);
    }

    public function store(Request $request){  
        $notification = Notification::create($request->all());
        if($request->has('mail')){
            $notification->mails()->createMany($request->input('mails'));
        }
    }

    public function show($stu_id){
        $notification = Notification::where('stu_id', $stu_id)->first();
        if (!$notification) {
            return response()->json(['error' => 'Notification not found'], 404);
        }
        return response()->json(['notification' => $notification]);;
    } 

    public function destroy($id){

    }
}
