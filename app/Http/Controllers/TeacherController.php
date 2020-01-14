<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsersValidation;



class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::all();
        return view('/teachers/index')->with('teachers',$teachers);
    }



    public function create()
    {
        return view('/teachers/create') ;
    }

    public function store(UsersValidation $request)
    {
        $teacher = new User;
        $teacher -> name = $request ->input('name');
        $teacher -> email = $request ->input('email');
        $teacher -> password = $request ->input('password');
        $teacher -> national_id = $request ->input('national_id');
        $teacher -> avatar = $request ->input('avatar');
        $teacher -> save() ;

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
        if($request ->input('avatar')){

            
                // // Get Filename With The Extension
                // $fileNameWithExt = request()->avatar->getClientOriginalName();
                // // Get Just Filename
                // $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                // //Get Just Ext
                // $extension = request()->avatar->getClientOriginalExtension();
                // // Filename To Store
                // $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // // Uploade Image
                // $path = request()->avatar->storeAs('public/cover_image',$fileNameToStore);
                // $teacher -> avatar = $fileNameToStore;

            

        $teacher -> avatar = $request ->input('avatar');
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
