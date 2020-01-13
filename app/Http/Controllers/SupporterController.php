<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
                dd($supporters);
                return $supporters;
            }
            else if($user->hasRole('Teacher'))
            {
                $supporters = User::where('teacher_id_supporter', auth()->user()->id)->get();
                dd($supporters);
                return $supporters;
            }
            else if($user->hasRole('Supporter')){
                dd('hello supporter');
            }

        }

        public function create(){
            return view('Courses.create');
        }

        public function store(Request $request){
                        User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'national_id'=>$request->national_id,
                'avatar'=>$request->avatar,
                'teacher_id_supporter'=>auth()->user()->id,
                'course_id'=>$request->course_id,
            ]);
        }

        public function destroy($supporter_id){
            $supporter = User::find($supporter_id);
            $supporter->delete();
            return view('Supporter.index');
        }
}
