<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UsersValidation;
use Illuminate\Support\Facades\DB;
use  App\Http\Requests\CoursesValidation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class SupporterController extends Controller
{
    public function index(){
            $supporters = [];
            $users = User::all();
            $user =  auth()->user();

            if($user->hasRole('Admin'))
            {
                foreach($users as $user){
                    if($user->hasRole('Supporter')){
                        $supporters [] = $user;
                    }
            }
                return view('/Supporters/index')->with('supporters',$supporters);            }
            else if($user->hasRole('Teacher'))
            {
                $supporters = User::where('teacher_id_supporter', auth()->user()->id)->get();
                return view('/Supporters/index')->with('supporters',$supporters);
            }
            else if($user->hasRole('Supporter')){
            }
        }

     public function create()
     {
         $courses = auth()->user()->C_Teacher ;
        return view('/Supporters/create')->with('courses',$courses) ;
     }

    public function store(UsersValidation $request)
    {
        $supporter = new User;
        $image = '';
        if(request()->avatar) {
            $image =Storage::putfile('imagess',$request->file('avatar'));
            $request->avatar->move(public_path('imagess'),$image);
            $supporter -> avatar = $image;
        }
        $supporter -> name = $request ->input('name');
        $supporter -> email = $request ->input('email');
        $supporter -> password = $request ->input('password');
        $supporter -> national_id = $request ->input('national_id');
        $supporter->teacher_id_supporter = auth()->user()->id;
        $supporter->assignRole('Supporter');
        $supporter -> save() ;
        return redirect('/supporters');
    }
    public function show($id)
    {
        $supporter = User::find($id);
        return view('/Supporters/show')->with('supporter',$supporter);
    }

    public  function edit($id)
    {
        $supporter = User::find($id);
        return view ('Supporters/edit')->with('supporter',$supporter);
    }

    public function update($id,UsersValidation $request)
    {
        $supporter =  User::find($id);
        $image = '';
        if(request()->avatar) {
            $image =Storage::putfile('imagess',$request->file('avatar'));
            $request->avatar->move(public_path('imagess'),$image);
            $supporter -> avatar = $image;
        }
        $supporter -> name = $request ->input('name');
        $supporter -> email = $request ->input('email');
        $supporter -> password = $request ->input('password');
        $supporter -> national_id = $request ->input('national_id');
        $supporter -> save() ;
        return redirect('/supporters');
    }

    public function destroy($id){
            $supporter = User::find($id);
            $supporter->delete();
        return redirect('/supporters');        }
}
