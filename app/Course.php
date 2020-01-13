<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'course_name', 'course_image', 'price','started_at','teacher_id'
    ];



    public function teacher()
    {
        return $this->belongsTo('App\User');
    }

    public function suppoter()
    {
        return $this->hasMany('App\User');
    }

    public function students(){

        return $this->belongsToMany('App\Student', 'students_courses', 'course_id', 'student_id');
    }
}
