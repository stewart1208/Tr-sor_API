<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PHPUnit\Metadata\Uses;

class UserController extends Controller
{
    //read
    public function index(){
       return response()->json(User::all());
    }
    public function show (User $user){
        return response()->json($user);
    }
    //create
    public function create(){
        return view('user.create');
    }
    public function store(Request $req){
        $data = $req->validate([
            'name'=>'string|required',
            'prenom'=>'string|required',
            'email'=>'email|unique|required',
            'password'=>'string|required',
            'num_de_telephone'=>'numeric|required',
            'date_de_naisence'=>'date|required|',
            'genre'=>'required|in:male,famme',
        ]);
        User::create($data);
        //Alert::success('Succès', 'User is created !');
        return redirect()->route('createUserForm');
    }
    //update
    public function edit(){
        return view('user.edit');
    }
    public function update(Request $req,User $user){
        $data = $req->validate([
            'name'=>'string',
            'prenom'=>'string',
            'email'=>'email|unique',
            'password'=>'string',
            'num_de_telephone'=>'numeric',
            'date_de_naisence'=>'date|',
            'genre'=>'in:male,famme',
        ]);
        $user->update($data);
    }
    //delete
    public function destroy(User $user){
        $user->delete();
        return response()->json(['message','user is deleted'],200);
    }
}
