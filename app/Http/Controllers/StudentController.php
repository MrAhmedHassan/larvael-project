<?php
namespace App\Http\Controllers;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class StudentController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'),201);
       // return response()->json(compact('token'),201);
    }

    public function register(Request $request)
    {
      $fileNameWithExt='';
      if($request['profile_image']){
        // Get Filename With The Extension
        $fileNameWithExt = request()->profile_image->getClientOriginalName();
        // Get Just Filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get Just Ext
        $extension = request()->profile_image->getClientOriginalExtension();
        // Filename To Store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Uploade Image
        $path = request()->profile_image->storeAs('public/cover_image',$fileNameToStore);
    }else{
        $fileNameToStore = 'noimage.jpg';
        $request->profile_image=$fileNameToStore;
    }

      $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'profile_image' => $request->profile_image,
        'birth_date' => $request->birth_date,
        'password' => Hash::make($request->password),
        'confirm_pass' => Hash::make($request->confirm_pass),

      ]);

      $token = JWTAuth::fromUser($student);
      return response()->json(compact('student','token'),201);
    }

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

    // return $this->respondWithToken($token);
    $any=Student::find(1);
    $token = JWTAuth::fromUser($any);
    return response()->json(compact('token'),201);
    }


   /* public function update(request $req, $id)
    {
        $request=Student::find($id);

        dd($req->name);
     // dd( $request);
    
/*
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'profile_image' => $request->profile_image,
        'birth_date' => $request->birth_date,
        'password' => $request->password,
        'confirm_pass' => $request->confirm_pass,*/
      
      /*  $request->name="mmmm";
        $request->email=request()->email;
        $request->gender=request()->gender;
        $request->profile_image=request()->profile_image;
        $request->birth_date=request()->birth_date;
        $request->password=request()->password;
        $request->confirm_pass=request()->confirm_path;*/

     // $request->save();
       // return redirect()->route('posts.index');
        
   // }

    public function update($id,request $request)
    {
        $student =  Student::find($id);
        $student -> name = $request->name;
        $student -> email = $request ->email;
        $student -> password =Hash::make($request->password);
        $student -> confirm_pass =  Hash::make($request->confirm_path);
        $student -> gender = $request ->gender;
        $student -> birth_date = $request ->birth_date;
        $student -> profile_image = $request ->profile_image;
        $student -> save() ;
       
    }

    public function show($post)
    {
        $student=Student::find($post);
        return response()->json(compact('student'),201);
    }

 
   
}

/*
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\AuthValidateRequest;
use App\Student;
use Illuminate\Support\Facades\Hash;


use App\Http\Resources\StudentResource;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class StudentController extends Controller{


  public function register(Request $request)
  {
        

      $student = Student::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' =>$request->input('password'),
          'confirm_pass' => $request->input('confirm_pass'),
          'gender' => $request->input('gender'),
          'birth_date' => $request->input('birth_date'),
          'profile_image' => $request->input('profile_image'),
      ]);
      //$student=Student::get();
      $token = JWTAuth::fromUser($student);
      return response()->json(compact('student','token'),201);
  }

public function index()
{
    //with user to eager to light the load in database
     // paginate to orgainse the number of elelments that appear in the page 
    $posts=Student::with('user')->paginate(3);
    return view('index',['posts'=>$posts]);   //another way return request()->post;
}

function create()
{
    return view('posts/create');
}

            public function store(request $request)
            {
              
              Student::create([
                    'title' => request()->title,
                    'content' => request()->content,
                    'user_id' => $request->user()->id

                ]);
              return redirect()->route('posts.index');
            }

          function show($post)
          {
              $any=Student::find($post);
              return view('show',['mypost'=>$any]);   //another way return request()->post;
          }

          function edit($post)
          {
              $alldata=Student::find($post);
              return view('edit',['ourpost'=>$alldata]);   //another way return request()->post;
          }

          public function update(request $req, $id)
          {
            
              $request=Student::find($id);
              
              $request->title=$req->title;
              $request->content=$req->content;
              $request->save();
              return redirect()->route('posts.index');
              
          }

          public function destroy($id)
          {
            //بمسك ال اﻻى دى فى متغير اسمه request
              $request=Student::find($id);
            $request->delete();
            //return redirect()->route('posts.index');
                
          }
       
}


/*

class StudentController extends Controller
//{
  
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
      $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'profile_image' => $request->profile_image,
        'birth_date' => $request->birth_date,
        'password' => bcrypt($request->password),
        'password_confirmation' => bcrypt($request->password_confirmation),

      ]);

      $token = auth()->login($student);

      return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);

      if (!$token = auth()->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
      }

      return $this->respondWithToken($token);
    }
    public function getAuthStudent(Request $request)
    {
        return response()->json(auth()->user());
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }
    protected function respondWithToken($token)
    {  
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }

function update(request $request ,$id){
 

  $students=Student::find($id);
  $students-> email = $request->input('email');
  $students-> gender = $request->input('gender');
  $students-> profile_image = $request->input('profile_image');
  $students-> birth_date = $request->input('birth_date');
  $students-> password = $request->input('password');
$students->save();
return response()->json($students);

}}
*/



