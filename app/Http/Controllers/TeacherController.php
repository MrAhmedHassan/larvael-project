<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeacherController extends Controller
{
    public function index(){
        $teachers = [];
        $users = User::all();
        foreach($users as $user){
            if($user->hasRole('Teacher')){
                $teachers [] = $user;
            }
        }
        return view('/teachers/index')->with('teachers',$teachers);
    }

    public function create()
    {
        return view('/teachers/create') ;
    }
}
