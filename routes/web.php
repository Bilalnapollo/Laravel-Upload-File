<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('file-upload');
// });

Route::get('/user',[UserController::class, 'index']);
Route::post('/user-store',[UserController::class, 'store']);
Route::get('/user-delete/{id}',[UserController::class, 'destroy']);
Route::get('/user-edit/{id}',[UserController::class, 'edit']);
Route::post('/user-update/{id}',[UserController::class, 'update']);