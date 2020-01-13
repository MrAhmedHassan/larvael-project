<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=="PUT")
        {
            $name='required';
            $email = 'required|unique:users';
            $password = 'required';
            $national_id = 'required|unique:users';
            $avatar = 'required';
        }
        else
        {
            $name='required';
            $email = 'required|unique:users';
            $password = 'required';
            $national_id = 'required|unique:users';
            $avatar = 'required';
        }
        return [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'national_id' => $national_id,
            'avatar' => $avatar,
        ];
    }
}
