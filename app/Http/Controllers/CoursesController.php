<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use  App\Http\Requests\CoursesValidation;
use BeyondCode\Comments\Comment;

class CoursesController extends Controller
{
    
    public function index()
    {
        $courses = Course::all();
        return view('/courses/index')->with('courses',$courses);
    }



    public function create()
    {
        return view('/courses/create') ;
    }

    public function store(CoursesValidation $request)
    {
        $course = new Course;
        $course -> course_name = $request ->input('course_name');
        $course -> course_image = $request ->input('course_image');
        $course -> price = $request ->input('price');
        $course -> started_at = $request ->input('started_at');
        $course -> ended_at = $request ->input('ended_at');
        $course -> save() ;

        return redirect('/courses');
    }

    public function show($id)
    {
        $courses = Course::find($id);
        return view('/courses/show')->with('courses',$courses);
    }

    public  function edit($id)
    {
        $course = Course::find($id); 
        return view ('courses/edit')->with('course',$course);
    }

    public function update($id,CoursesValidation $request)
    {
        $course = Course::find($id);
        $course -> course_name = $request ->input('course_name');
        $course -> course_image = $request ->input('course_image');
        $course -> price = $request ->input('price');
        $course -> started_at = $request ->input('started_at');
        $course -> ended_at = $request ->input('ended_at');
        $course -> save() ;

        return redirect('/courses');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course -> delete();
        return redirect('/courses');
    }

    public function showcomment(){
        // $post = Course::find(1);
        // $comment = $post->comment('This is a comment from a user.');
        // return $comment;

        $comments = Comment::all();
        return view('comments/index')->with('comments',$comments);

    }
}
