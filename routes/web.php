<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
////Route::get('/level', 'LevelController@getFirstlevel')->name('get.level');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
//Route::post('/get/status', 'LevelController@getAnswerStatus')->name('submit.exam');
Route::prefix('pasHrAd')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@admin')->name('admin.dashboard');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	Route::post('/password/email', 'Auth\AdmshowUserExamsinForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::namespace('Admin')->middleware('auth:admin')->group(function(){
	Route::prefix('manage')->group(function(){
		Route::prefix('users')->group(function(){
			Route::get('/show', 'UserController@showAllUsers')->name('show.users');
			Route::get('/create','UserController@createUser')->name('create.user');
			Route::post('/store','UserController@storeUser')->name('store.user');
			Route::get('/assign-exam/{user_id}','UserController@assignExamToUser')->name('assign.exam');
			Route::get('/edit/{user_id}','UserController@editUser')->name('edit.user');
			Route::get('/exams/{user_id}','UserController@showUserExams')->name('exams.user');
			Route::put('/update/{user_id}','UserController@updateUser')->name('update.user');
			Route::get('/live_search', 'UserController@index');
            Route::get('/live_search/action', 'UserController@action')->name('live_search.action');
		});

		Route::prefix('exams')->group(function(){
			Route::post('/update/{exam_id}','ExamController@updateStatus')->name('update.status');
		});

		Route::prefix('questions')->group(function(){
			Route::get('/show/{level}', 'QuestionController@showAllQuestions')->name('show.questions');
			Route::get('/create','QuestionController@createQuestion')->name('create.question');
			Route::get('/add/soundorparagraph','QuestionController@createRecord')->name('create.sound');
			Route::post('/store','QuestionController@storeQuestion')->name('store.question');
			Route::post('/store/sound','QuestionController@storeSoundOrParagraph')->name('store.sound');
			Route::get('/edit/{question_id}','QuestionController@editQuestion')->name('edit.question');
			Route::get('/edit_paragraph/{paragraph_id}','QuestionController@editParagraph')->name('edit.paragraph');
			Route::post('/update/{question_id}','QuestionController@updateQuestion')->name('update.question');
			Route::post('/update_paragraph/{paragraph_id}','QuestionController@updateParagraph')->name('update.paragraph');
			Route::get('/delete/{id}','QuestionController@deleteQuestion')->name('delete.question');
			Route::get('/delete_paragraph/{id}','QuestionController@deleteParagraph')->name('delete.paragraph');
			Route::get('/delete_sound/{id}','QuestionController@deleteSound')->name('delete.sound');
		});
  	});
});


/*=Linkes===================================================*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return "cache cleared successfully";
});







