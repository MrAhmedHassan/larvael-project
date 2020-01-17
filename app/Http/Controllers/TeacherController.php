<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UsersValidation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function store(UsersValidation $request)
    {
        $teacher = new User;
        $image = '';
        if(request()->avatar) {
            $image =Storage::putfile('imagess',$request->file('avatar'));
            $request->avatar->move(public_path('imagess'),$image);
            $teacher -> avatar = $image;
        }
        $teacher -> name = $request ->input('name');
        $teacher -> email = $request ->input('email');
        $teacher -> password = $request ->input('password');
        $teacher -> national_id = $request ->input('national_id');
        $teacher -> save() ;
        $teacher->assignRole('Teacher');
        return redirect('/teachers');
    }

    public function show($id)
    {
        $teacher = User::find($id);
        return view('/teachers/show')->with('teacher',$teacher);
    }

    public  function edit($id)
    {
        $teacher = User::find($id);
        return view ('teachers/edit')->with('teacher',$teacher);
    }

    public function update($id,UsersValidation $request)
    {
        $teacher =  User::find($id);
        $image = '';
        if(request()->avatar) {
            $image =Storage::putfile('imagess',$request->file('avatar'));
            $request->avatar->move(public_path('imagess'),$image);
            $teacher -> avatar = $image;
        }
        $teacher -> name = $request ->input('name');
        $teacher -> email = $request ->input('email');
        $teacher -> password = $request ->input('password');
        $teacher -> national_id = $request ->input('national_id');
        $teacher -> save();
        return redirect('/teachers');
    }

    public function destroy($id)
    {
        $teacher = User::find($id);
        $teacher -> delete();
        return redirect('/teachers');
    }

}
