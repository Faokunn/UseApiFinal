<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\NotificationController;
use App\Http\Controllers\Student\StudentBagItemController;
use App\Http\Controllers\Student\StudentBagController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\MailsController;
use App\Http\Controllers\Student\BookCollectionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Item\ItemBookController;
use App\Http\Controllers\Item\ItemLowerUniformController;
use App\Http\Controllers\Item\ItemUpperUniformController;
use App\Http\Controllers\Item\ItemrsoController;
use App\Http\Controllers\Admin\AdminController;

// LANCE
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\CourseController;

use App\Http\Controllers\Admin\ZestController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Admin Login
Route::post('/admin/login', [AuthenticationController::class, 'login']);
Route::post('/admin/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

//Student Login
Route::post('/auth/student/login', [StudentController::class, 'login']);
Route::post('/auth/student/logout', [StudentController::class, 'logout'])->middleware('auth:sanctum');

//Student
Route::apiResource('students', StudentController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('mails', MailsController::class);
Route::apiResource('studentbags', StudentBagController::class);
Route::apiResource('studentbagitems', StudentBagItemController::class);
Route::apiResource('bookcollections', BookCollectionController::class);

//Customized Route
Route::put('/updateprofile/{id}', [ProfileController::class, 'update']);

Route::get('/studentbagitems/{id}/{status}', [StudentBagItemController::class, 'show']);
Route::put('/studentbagitems/{id}/{status}', [StudentBagItemController::class, 'changeStatus']);
Route::put('/reserveditems/{count}/{course}/{gender}/{type}/{body}/{size}', [StudentBagItemController::class, 'reservedItemFirst']);
Route::get('/showallitems/{stubag_id}', [StudentBagItemController::class, 'showAllItems']);
Route::get('/itempickup/{code}', [StudentBagItemController::class, 'codeShow']);

Route::get('/bookcollections/{id}/{status}', [BookCollectionController::class, 'show']);
Route::put('/bookcollections/{id}/{status}', [BookCollectionController::class, 'changeStatus']);
Route::put('/reservedbooks/{count}/{identifier}', [BookCollectionController::class, 'reservedBookFirst']);
Route::get('/showallbooks/{stubag_id}', [BookCollectionController::class, 'showAllBooks']);
Route::get('/bookpickup/{code}', [BookCollectionController::class, 'codeShow']);

Route::put('/notificationdone/{id}', [MailsController::class,'notificationDone']);

//Item
Route::apiResource('item-books', ItemBookController::class);
Route::apiResource('item-lower-uniforms', ItemLowerUniformController::class);
Route::apiResource('item-upper-uniforms', ItemUpperUniformController::class);
Route::apiResource('item-rsos', ItemrsoController::class);

//Admin
Route::apiResource('admins', AdminController::class);

// BY LANCE
// Announcements
Route::apiResource('announcements', AnnouncementController::class);

// Department
Route::apiResource('departments', DepartmentController::class);

// Course
Route::apiResource('courses', CourseController::class);