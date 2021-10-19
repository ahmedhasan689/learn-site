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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => ['auth', 'User']], function () {
	Route::get('admin', function() {
    	return redirect('/admin/dashboard');
	});


	Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('home');

	Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/tracks', 'Admin\TracksController');

	Route::resource('admin/videos', 'Admin\VideosController');

	Route::resource('admin/quiz', 'Admin\QuizController');
  
	Route::resource('admin/courses', 'Admin\CoursesController');

	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);

	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);

	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});
