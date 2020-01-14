<?php
//use Tymon\JWTAuth\Facades\JWTAuth;
//use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/register', 'StudentController@register');
Route::post('login', 'StudentController@login');
Route::group(['middleware' => ['jwt.verify']], function() {
Route::post('/posts/{post}', 'StudentController@update')->name('posts.update');

Route::get('/students/{post}','StudentController@show')->name('posts.show');
});

    /////////////////////////////////////////


