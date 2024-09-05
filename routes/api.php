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

use App\Http\Controllers\Admin\AuthenticationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Admin Login
Route::post('/auth/admin/login', [AuthenticationController::class, 'login']);
Route::post('/auth/admin/logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');

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

//Item
Route::apiResource('item-books', ItemBookController::class);
Route::apiResource('item-lower-uniforms', ItemLowerUniformController::class);
Route::apiResource('item-upper-uniforms', ItemUpperUniformController::class);
Route::apiResource('item-rsos', ItemrsoController::class);

//Admin
Route::apiResource('admins', AdminController::class);


