<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Announcement;

class AnnouncementController extends Controller
{
    public function index(){
        $data = Announcement::all();
        return response()->json($data);
    }
    public function create(Request $request){
        $request->validate([
            'department' => 'required|max:4|string',
            'body' => 'required|max:500|string',
        ]);
        Announcement::create([
            'department' => $request->department,
            'body' => $request->body,
        ]);
        return response()->json(['message' => "Added Succesfully"]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'department' => 'required|max:4|string',
            'body' => 'required|max:500|string',
        ]);
        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'department' => $request->department,
            'body' => $request->body,
        ]);
        return response()->json(['message' => "Updated Succesfully"]);
    }
    public function destroy($id){
        $announcement = Announcement::find($id);
        $announcement -> delete();
        return response()->json(['message' => "Deleted Succesfully"]);
    }
}
