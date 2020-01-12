<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        return view("Courses.create");
    }

    public function create(){
        Course::create([
            'course_name'=>'prog',
            'course_image'=>'image',
            'course_price'=>10,
            'started_at'=> '10-10-2010',
            'ended_at'=>'20-10-2010',
            'teacher_id'=>auth()->user()->id
        ]);
    }
}
