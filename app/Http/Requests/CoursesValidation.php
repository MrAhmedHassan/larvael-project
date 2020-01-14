<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesValidation extends FormRequest
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
            $course_name='required';
            $price = 'required';
            $started_at = 'required';
            $ended_at = 'required';
        }
        else
        {
            $course_name='required';
            $price = 'required';
            $started_at = 'required';
            $ended_at = 'required';
        }
        return [
            'course_name' => $course_name,
            'price' => $price,
            'started_at' => $started_at,
            'ended_at' => $ended_at,
        ];
    }
}
