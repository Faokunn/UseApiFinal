<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\BooksController;
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
Route::apiResource('books', BooksController::class);
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('mails', MailsController::class);
Route::apiResource('studentbags', StudentBagController::class);
Route::apiResource('studentbagitems', StudentBagItemController::class);
Route::apiResource('bookcollections', BookCollectionController::class);

//Customized Route
Route::get('/studentbagitems/{id}/{status}', [StudentBagItemController::class, 'show']);
Route::get('/bookcollections/{id}/{status}', [BookCollectionController::class, 'show']);

//Item
Route::apiResource('item-books', ItemBookController::class);
Route::apiResource('item-lower-uniforms', ItemLowerUniformController::class);
Route::apiResource('item-upper-uniforms', ItemUpperUniformController::class);
Route::apiResource('item-rsos', ItemrsoController::class);

//Admin
Route::apiResource('admins', AdminController::class);






// BY LANCE
// Announcements
Route::get('/announcement/get', [AnnouncementController::class, 'index']);
Route::post('/announcement/create', [AnnouncementController::class, 'create']);
Route::put('/announcement/update/{id}', [AnnouncementController::class, 'update']);
Route::delete('/announcement/delete/{id}', [AnnouncementController::class, 'destroy']);

// Department
Route::get('/department/get', [DepartmentController::class, 'index']);
Route::post('/department/create', [DepartmentController::class, 'create']);
Route::put('/department/update/{id}', [DepartmentController::class, 'update']);
Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroy']);

// Course
Route::get('/course/get', [CourseController::class, 'index']);
Route::get('/course/show/{id}', [CourseController::class, 'show']);
Route::post('/course/create', [CourseController::class, 'create']);
Route::put('/course/update/{id}', [CourseController::class, 'update']);
Route::delete('/course/delete/{id}', [CourseController::class, 'destroy']);