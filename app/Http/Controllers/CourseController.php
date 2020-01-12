<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CourseController extends Controller
{
    public function index(){
        $admin = 'Admin';
        $teacher = 'Teacher';
         $user =  auth()->user();
         if($user->hasRole($admin)){
             dd($user->roles);
         }
             else if($user->hasRole($teacher)){
                 dd($user->roles);
             }
//        dd($authRole);

//        if();
        $courses = Course::where('teacher_id', auth()->user()->id)->get();
//        $course->teacher;
            dd($courses);
//        $courses = Course::where()->teacher_id = auth()->user()->id;

    }

    public function create(){
        return view('Courses.create');
    }

    public function store(){
//        return "hello";

        Course::create([
            'course_name'=>'prog',
            'course_image'=>'image',
            'price'=>10,
            'started_at'=> time(),

            'teacher_id'=>auth()->user()->id,
            'ended_at'=> time(),
        ]);

    }
}
