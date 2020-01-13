<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class StudentController extends Controller
{
    public function index(){
        $user = auth()->user();
        if($user->hasRole('Admin')){
            $students = Student::all();
            return $students;
        }if($user->hasRole('Teacher')){
            $courses = Course::where('teacher_id', auth()->user()->id)->get();
            $coursesWithStudents = [];
            foreach ($courses as $course){
                $courseName = $course->course_name;
                $coursesWithStudents [] = [$courseName => $course->students];
            }
            return $coursesWithStudents;
        }
    }
}
