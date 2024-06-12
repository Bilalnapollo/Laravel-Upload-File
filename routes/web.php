<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('file-upload');
// });

Route::get('/all-images',[UserController::class, 'index'])->name('home');
Route::post('/image-store',[UserController::class, 'store']);
Route::get('/image-delete/{id}',[UserController::class, 'destroy'])->name('delete');
Route::get('/image-edit/{id}',[UserController::class, 'edit'])->name('edit');
Route::post('/image-update/{id}',[UserController::class, 'update'])->name('update');