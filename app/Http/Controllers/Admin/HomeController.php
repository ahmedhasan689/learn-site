<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Track;
use App\Course;
use App\User;
use App\Quiz;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $tracks_count  = Track::all()->count();
        $courses_count = Course::all()->count();
        $users_count   = User::where('admin', '0')->count();
        $quizzes_count = Quiz::all()->count();

        $tracks  = Track::orderBy('id', 'desc')->limit(5)->get();
        $courses = Course::orderBy('id', 'desc')->limit(5)->get();
        $users   = User::where('admin', '0')->limit(5)->get();
        $quizzes = Quiz::orderBy('id', 'desc')->limit(5)->get();


        return view('Admin.dashboard', compact('tracks_count', 'courses_count', 'users_count', 'quizzes_count', 'tracks', 'courses', 'users', 'quizzes'));
    }
}
