<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name', 'email', 'password','confirm_pass','gender','birth_date','profile_image'
    ];

    
    public function courses(){

        return $this->belongsToMany('App\Course');
    }
}
