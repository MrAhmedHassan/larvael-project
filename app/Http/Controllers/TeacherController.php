<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function index(){
//        $role = Role::findById(2);
//        dd($role->name);
        $teachers = [];
        $users = User::all();
        foreach($users as $user){
            if($user->hasRole('Teacher')){
                $teachers [] = $user;
            }
        }
//        return view('Teacher.index',$teachers);
        return response()->json($teachers);

    }
}
