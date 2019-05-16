<?php

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

Route::prefix('users')->group(function() {
	Route::post('register', 'API\RegisterController@register');
	Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('me', 'API\AuthController@me');
});

Route::group(['middleware'=> ['jwt']], function() {
	Route::prefix('levels')->group(function() {
		Route::get('/getfor/{level}/{part}', 'API\LevelController@getlevel');
		Route::get('/get_current_level_for/{userId}', 'API\LevelController@getCurrentLevel');
		Route::get('/status/{id}', 'API\LevelController@status');
		Route::get('/closeExam/{userId}', 'API\LevelController@closeExam');
		Route::post('/submit/answers', 'API\LevelController@getAnswerStatus');
	});
});
