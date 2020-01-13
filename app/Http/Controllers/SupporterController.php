<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Http\Requests\UsersValidation;




class SupporterController extends Controller
{
    public function index()
    {
        $supporters = User::all();
        return view('/supporters/index')->with('supporters',$supporters);
    }



    public function create()
    {
        $courses = Course::all();
        return view('/supporters/create')->with('courses',$courses) ;
    }

    public function store(UsersValidation $request)
    {
        $supporter = new User;
        $supporter -> name = $request ->input('name');
        $supporter -> email = $request ->input('email');
        $supporter -> password = $request ->input('password');
        $supporter -> national_id = $request ->input('national_id');
        $supporter -> avatar = $request ->input('avatar');
        $supporter -> save() ;

        return redirect('/supporters');
    }

    public function show($id)
    {
        $supporter = User::find($id);
        return view('/supporters/show')->with('supporter',$supporter);
    }

    public  function edit($id)
    {
        $supporter = User::find($id); 
        return view ('supporters/edit')->with('supporter',$supporter);
    }

    public function update($id,UsersValidation $request)
    {
    
        $supporter =  User::find($id);
        $supporter -> name = $request ->input('name');
        $supporter -> email = $request ->input('email');
        $supporter -> password = $request ->input('password');
        $supporter -> national_id = $request ->input('national_id');
        $supporter -> avatar = $request ->input('avatar');
        $supporter -> save() ;

        return redirect('/supporters');
    }

    public function destroy($id)
    {
        $supporter = User::find($id);
        $supporter -> delete();
        return redirect('/supporters');
    }
}
