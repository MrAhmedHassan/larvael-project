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
        $supporter = 'Supporter';
         $user =  auth()->user();
         if($user->hasRole($admin)){
             $courses = Course::all();
             return $courses;
         }
         else if($user->hasRole($teacher)){
             $courses = Course::where('teacher_id', auth()->user()->id)->get();
             return $courses;
         }else if($user->hasRole($supporter)){
             dd('hello');
         }
    }

    public function create(){
        return view('Courses.create');
    }

    public function store(){
        Course::create([
            'course_name'=>'prog',
            'course_image'=>'image',
            'price'=>10,
            'started_at'=> time(),
            'teacher_id'=>auth()->user()->id,
            'ended_at'=> time(),
        ]);
    }

    public function destroy($course_id){
        $course = Course::find($course_id);
        $checkStudentEnrolled = DB::table('students_courses')
            ->where('course_id',$course_id)
            ->first();
        if($checkStudentEnrolled){
            return view('Courses.index');
        }else{
            $course->delete();
            return view('Courses.index');
        }
    }
}
