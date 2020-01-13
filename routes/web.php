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

Route::get('/teachers','TeacherController@index')->name('teachers.index');


Route::get('/courses','CourseController@index')->name('courses.index');
Route::get('/courses/create','CourseController@create')->name('courses.create');
Route::post('/courses/store','CourseController@store')->name('courses.store');
Route::post('/courses/destroy','CourseController@destroy')->name('courses.destroy');

Route::get('/supporters','SupporterController@index')->name('supporters.index');
Route::get('/supporters/create','SupporterController@create')->name('supporters.create');
Route::post('/supporters/store','SupporterController@store')->name('supporter.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
