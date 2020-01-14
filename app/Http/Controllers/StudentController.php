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

    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
  ]);

  if($validator->fails()){
    return response()->json($validator->errors()->toJson(), 400);
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
    $any=Student::find(1);
    $token = JWTAuth::fromUser($any);
    return response()->json(compact('token'),201);
    }

    public function update($id,request $request)
    {
          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
          return response()->json($validator->errors()->toJson(), 400);
        }
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


