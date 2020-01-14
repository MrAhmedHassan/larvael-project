<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Http\Requests\UsersValidation;


class StudentController extends Controller
{
    public function index()
    {
        $students = User::all();
        return view('/students/index')->with('students',$students);
    }

    public function show($id)
    {
        $student = User::find($id);
        return view('/students/show')->with('student',$student);
    }
}
