<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

//Users 

Route::controller(UserController::class)->group(function(){
    //create
    Route::get('/users/create','create')->name('createUserForm');
    Route::post('/users/create','store')->name('createUser');
    //read
    Route::get('/users','index')->name('getAllUser');
    Route::get('/users/{user}','show')->name('getuser');
    //update
    Route::get('/user/edit/{user}','edit')->name('updateUserForm');
    Route::put('users/update/{user}','update')->name('updateUser');
    //delete
    Route::delete('/user/delete/{user}')->name('deleteUser');
});