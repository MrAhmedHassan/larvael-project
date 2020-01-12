<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class TeacherController extends Controller
{
    public function index()
    {
        $posts = User::all();
        return view('/Teacher/index')->with('posts',$posts);

        // return view('dashboard');
    }



    public function create()
    {
        return view('/Teacher/create') ;
    }

    public function store(Request $request)
    {
        $post = new User;
        $post -> name = $request ->input('name');
        $post -> email = $request ->input('email');
        $post -> password = $request ->input('password');
        $post -> national_id = $request ->input('national_id');
        $post -> avatar = $request ->input('avatar');
        $post -> save() ;

        return redirect('/Teacher');
    }

    public function show($id)
    {
        $posts = User::find($id);
        return view('/Teacher/show')->with('posts',$posts);
    }

    public  function edit($id)
    {
        $post = User::find($id); 
        return view ('Teacher/edit')->with('post',$post);
    }

    public function update($id,Request $request)
    {
        // $posts = Post::find($id);
        // $posts->update([
        //     'title'=>request()->title,
        //     'description'=>request()->description,
        //     'creator'=>request()->creator
        // ]);
        // return redirect (route('Teacher/index'));
        $post =  User::find($id);
        $post -> name = $request ->input('name');
        $post -> email = $request ->input('email');
        $post -> password = $request ->input('password');
        $post -> national_id = $request ->input('national_id');
        $post -> avatar = $request ->input('avatar');
        $post -> save() ;

        return redirect('/Teacher');
    }

    public function destroy($id)
    {
        $post = User::find($id);
        $post -> delete();
        return redirect('/Teacher');
    }
}
