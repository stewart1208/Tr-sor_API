<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    //create 
    public function create(){
        return view('student.create');
    }
    public function store(Request $req){
        $validated = $req->validate([
            'name' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'date_de_naisence' => 'required|date',
            'num_de_telephone' => 'required|numeric', 
            'genre' => 'required|in:m,f',
            'nivaux' => 'required|in:1p,2p,3p,4p,5p,1m,2m,3m,4m,1l,2l,3l', 
        ]);
        
        $user = new User();
        $user->email = $req->input('email');
        $user->password = bcrypt($req->input('password'));
        $user->save();

        $student = new Student();
        $student->name = $req->input('name');
        $student->prenom = $req->input('prenom');
        $student->date_de_naisence = $req->input('date_de_naisence');
        $student->num_de_telephone = $req->input('num_de_telephone');
        $student->genre = $req->input('genre');
        $student->nivaux = $req->input('nivaux');
        $student->student_id = $user->id; 
        $student->save();

        return redirect('/')->with('success','Student created!');
    }
    //read
    public function index(){
       // $students = Student::with('user')->get();
       $students = DB::select('SELECT s.*, u.* FROM students AS s JOIN users AS u ON s.student_id = u.id;');
        return response()->json($students);
    }
    public function show (Student $student){
        $user = $student->user; 
        return response()->json($student::with('user')->get());
    }
    //update
    public function edit(){
        return view('student.edit');
    }
    public function update(Request $req, Student $student) {
        $validated = $req->validate([
            'name' => 'string',
            'prenom' => 'string',
            'email' => 'email|unique:users,email,'.$student->user->id, 
            'password' => 'string',
            'date_de_naisence' => 'date',
            'num_de_telephone' => 'numeric', 
            'genre' => 'in:m,f',
            'nivaux' => 'in:1p,2p,3p,4p,5p,1m,2m,3m,4m,1l,2l,3l', 
        ]);
    
        $student->name = $req->input('name');
        $student->prenom = $req->input('prenom');
        $student->date_de_naisence = $req->input('date_de_naisence');
        $student->num_de_telephone = $req->input('num_de_telephone');
        $student->genre = $req->input('genre');
        $student->nivaux = $req->input('nivaux');

        if ($req->has('email')) {
            $student->user->email = $req->input('email');
            $student->user->save();
        }
    

        if ($req->has('password')) {
            $student->user->password = bcrypt($req->input('password'));
            $student->user->save();
        }
    

        $student->save();

        return response()->json(['message' => 'Student updated successfully']);
    }
    public function destroy(Student $student){
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
    
}