<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//students

//create students
Route::get('/students/create',[StudentController::class,'create'])->name('createStudentForm');
Route::post('/students/create',[StudentController::class,'store'])->name('createStudent');
//read students
Route::get('/students',[StudentController::class,'index'])->name('getAllStudents');
Route::get('/students/{student}',[StudentController::class,'show'])->name('getStudent');
//update students
Route::get('/students/edit/{student}',[StudentController::class,'edit'])->name('updateStudentForm');
Route::put('/students/edit/{student}',[StudentController::class,'update'])->name('updateStudent');
//delete students
Route::delete('/students/destroy/{student}',[StudentController::class,'destroy'])->name('destroyStudent');