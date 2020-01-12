<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;


class CoursesController extends Controller
{
    public function index()
    {
        $posts = Course::all();
        return view('/Courses/index')->with('posts',$posts);
        
        // return view('dashboard');
    }



    public function create()
    {
        return view('/Courses/create') ;
    }

    public function store(Request $request)
    {
        $post = new Course;
        $post -> course_name = $request ->input('course_name');
        $post -> course_image = $request ->input('course_image');
        $post -> price = $request ->input('price');
        // $post -> created_at = $request ->input('created_at');
        $post -> started_at = $request ->input('started_at');
        $post -> ended_at = $request ->input('ended_at');
        $post -> save() ;

        return redirect('/Courses');
    }

    public function show($id)
    {
        $posts = Course::find($id);
        return view('/Courses/show')->with('posts',$posts);
    }

    public  function edit($id)
    {
        $post = Course::find($id); 
        return view ('Courses/edit')->with('post',$post);
    }

    public function update($id,Request $request)
    {
        // $posts->update([
        //     'title'=>request()->title,
        //     'description'=>request()->description,
        //     'creator'=>request()->creator
        // ]);
        // return redirect (route('Courses/index'));
        $post = Course::find($id);
        $post -> course_name = $request ->input('course_name');
        $post -> course_image = $request ->input('course_image');
        $post -> price = $request ->input('price');
        // $post -> created_at = $request ->input('created_at');
        $post -> started_at = $request ->input('started_at');
        $post -> ended_at = $request ->input('ended_at');
        $post -> save() ;

        return redirect('/Courses');
    }

    public function destroy($id)
    {
        $post = Course::find($id);
        $post -> delete();
        return redirect('/Courses');
    }
}
