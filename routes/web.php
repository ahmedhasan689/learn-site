<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/login', 'LoginController@index')->middleware('auth');

Route::get('/courses/{slug}', 'CourseController@index');




Route::group(['middleware' => ['auth', 'User']], function () {
	Route::get('admin', function() {
    	return redirect('/admin/dashboard');
	});


	Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/tracks', 'Admin\TracksController');

	Route::resource('admin/tracks.courses', 'Admin\CourseTrackController');

	Route::resource('admin/videos', 'Admin\VideosController');

	Route::resource('admin/quiz', 'Admin\QuizController');

	Route::resource('admin/quizzes.questions', 'Admin\QuizQuestionController');

	Route::resource('admin/questions', 'Admin\QuestionsController');

	Route::resource('admin/courses', 'Admin\CoursesController');

	Route::resource('admin/courses.videos', 'Admin\CourseVideoController');

	Route::resource('admin/courses.quizzes', 'Admin\CourseQuizController');

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);

	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);

	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});
