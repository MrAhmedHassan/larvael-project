<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'cover_image' => ['image','nullable','max:1999'],
            'national_ID' => ['required', 'integer', 'max:300'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['cover_image']){
            // Get Filename With The Extension
            $fileNameWithExt = request()->cover_image->getClientOriginalName();
            // Get Just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get Just Ext
            $extension = request()->cover_image->getClientOriginalExtension();
            // Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Uploade Image
            $path = request()->cover_image->storeAs('public/cover_image',$fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cover_image' => $fileNameToStore,
            'national_id' => $data['national_ID'],
        ]);
    }
}
