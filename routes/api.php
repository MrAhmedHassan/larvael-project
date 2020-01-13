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
/*
//added by for the jwt
Route::group(['middleware' => ['jwt.verify']], function() { Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');});

    */
    /*
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});*/

/*Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::get('student', 'AuthController@getAuthStudent');*/

Route::post('/register', 'StudentController@register');
Route::post('login', 'StudentController@login');





    //////////////////////////////////////////
//Route::get('/posts/{post}/edit', 'StudentController@edit')->name('posts.edit')->middleware('auth:api');
Route::post('/posts/{post}', 'StudentController@update')->name('posts.update')->middleware('auth:api');
//Route::DELETE('/posts/{post}', 'StudentController@destroy')->name('posts.destroy')->middleware('auth:api');
//Route::get('/posts','StudentController@index')->name('posts.destroy')->middleware('auth:api');
Route::get('/students/{post}','StudentController@show')->name('posts.show')->middleware('jwt.verify');

    /////////////////////////////////////////


