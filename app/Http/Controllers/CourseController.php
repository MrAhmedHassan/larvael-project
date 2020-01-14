<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use  App\Http\Requests\CoursesValidation;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UsersValidation;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class CourseController extends Controller
{
    public function index(){
        $admin = 'Admin';
        $teacher = 'Teacher';
        $supporter = 'Supporter';
         $user =  auth()->user();
         if($user->hasRole($admin)){
             $courses = Course::all();
             return view('/Courses/index')->with('courses',$courses);
         }
         else if($user->hasRole($teacher)){
             $courses = Course::where('teacher_id', auth()->user()->id)->get();
             return view('/Courses/index')->with('courses',$courses);
         }else if($user->hasRole($supporter)){
             dd('hello');
         }
    }

    public function create()
    {
        return view('/Courses/create') ;
    }

    public function store(CoursesValidation $request)
    {
        $course = new Course;
        $image = '';
        if(request()->course_image) {
            $image =Storage::putfile('imagess',$request->file('course_image'));
            $request->course_image->move(public_path('imagess'),$image);
            $course -> course_image =  $image;
        }
        $course -> course_name = $request ->input('course_name');
        $course -> teacher_id = auth()->user()->id;
        $course -> price = $request ->input('price');
        $course -> started_at = $request ->input('started_at');
        $course -> ended_at = $request ->input('ended_at');
        $course -> save() ;
        return redirect('/courses');
    }
    public function show($id)
    {
        $courses = Course::find($id);
        return view('/Courses/show')->with('courses',$courses);
    }

    public  function edit($id)
    {
        $course = Course::find($id);
        return view ('Courses/edit')->with('course',$course);
    }

    public function update($id,CoursesValidation $request)
    {
        $course = Course::find($id);
        $image = '';
        if(request()->course_image) {
            $image =Storage::putfile('imagess',$request->file('course_image'));
            $request->course_image->move(public_path('imagess'),$image);
            $course -> course_image =  $image;
        }
        $course -> course_name = $request ->input('course_name');
        $course -> price = $request ->input('price');
        $course -> started_at = $request ->input('started_at');
        $course -> ended_at = $request ->input('ended_at');
        $course -> save() ;
        return redirect('/courses');
    }

    public function destroy($id){
        $course = Course::find($id);
        $checkStudentEnrolled = DB::table('students_courses')
            ->where('course_id',$id)
            ->first();
        if($checkStudentEnrolled){
            return redirect('/courses');
        }else{
            $course->delete();
            return redirect('/courses');
        }
    }
}
