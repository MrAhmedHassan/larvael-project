<?php

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

//Route::get('/teachers','TeacherController@index')->name('teachers.index');



//Route::get('/supporters','SupporterController@index')->name('supporters.index');
//Route::get('/supporters/create','SupporterController@create')->name('supporters.create');
//Route::post('/supporters/store','SupporterController@store')->name('supporter.store');
//
//Route::get('/students','StudentController@index')->name('students.index');

Route::group(['middleware' => ['role:Admin','auth']], function () {
    Route::get('/teachers', 'TeacherController@index')->name('teachers.index');
    Route::get('/teachers/create','TeacherController@create');
    Route::post('/teachers','TeacherController@store');
    Route::get('/teachers/{teacher}','TeacherController@show')->name('teachers.show');
    Route::get('/teachers/{teacher}/edit','TeacherController@edit')->name('teachers.edit');
    Route::put('/teachers/{teacher}','TeacherController@update')->name('teachers.update');
    Route::delete('/teachers/{teacher}','TeacherController@destroy');
});

//yehia
Route::group(['middleware' => ['role:Admin|Teacher','auth']], function () {
Route::get('/courses', 'CourseController@index')->name('courses.index');
Route::get('/courses/create','CourseController@create');
Route::post('/courses','CourseController@store');
Route::get('/courses/{course}','CourseController@show')->name('courses.show');
Route::get('/courses/{course}/edit','CourseController@edit')->name('courses.edit');
Route::put('/courses/{course}','CourseController@update')->name('courses.update');
Route::delete('/courses/{course}','CourseController@destroy');
});

//yahia
Route::group(['middleware' => ['role:Admin|Teacher','auth']], function () {
Route::get('/supporters', 'SupporterController@index')->name('supporters.index');
Route::get('/supporters/create','SupporterController@create');
Route::post('/supporters','SupporterController@store');
Route::get('/supporters/{supporter}','SupporterController@show')->name('supporters.show');
Route::get('/supporters/{supporter}/edit','SupporterController@edit')->name('supporters.edit');
Route::put('/supporters/{supporter}','SupporterController@update')->name('supporters.update');
Route::delete('/supporters/{supporter}','SupporterController@destroy');
});

Route::group(['middleware' => ['role:Admin|Teacher|supporter','auth']], function () {
Route::get('/comments','CommentController@index')->name('comments.index');
});

Route::group(['middleware' => ['role:Admin|Teacher','auth']], function () {
Route::get('/students','StudentController@index')->name('students.index');
});

Route::group(['middleware' => ['role:Admin|Teacher','auth']], function () {
Route::get('/statistic','StatisticController@index')->name('statistic.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
