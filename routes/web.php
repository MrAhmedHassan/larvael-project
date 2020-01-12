<?php
use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user',function(){
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/Teacher', 'TeacherController@index')->name('teacher.index');
Route::get('/Teacher/create','TeacherController@create');
Route::post('/Teacher','TeacherController@store');
Route::get('/Teacher/{post}','TeacherController@show')->name('teacher.show');
Route::get('/Teacher/{post}/edit','TeacherController@edit')->name('teacher.edit');
Route::put('/Teacher/{post}','TeacherController@update')->name('teacher.update');
Route::delete('/Teacher/{post}','TeacherController@destroy');




Route::get('/Courses', 'CoursesController@index')->name('courses.index');
Route::get('/Courses/create','CoursesController@create');
Route::post('/Courses','CoursesController@store');
Route::get('/Courses/{post}','CoursesController@show')->name('courses.show');
Route::get('/Courses/{post}/edit','CoursesController@edit')->name('courses.edit');
Route::put('/Courses/{post}','CoursesController@update')->name('courses.update');
Route::delete('/Courses/{post}','CoursesController@destroy');
