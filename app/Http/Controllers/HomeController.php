<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Track;
use App\User;


class HomeController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index() {
        $user_courses = User::findOrFail(7)->courses;

        $tracks = Track::with('courses')->orderBy('id', 'desc')->get();

        // Get Famous Tracks By Id 
        $famous_tracks_ids = Course::pluck('track_id')->countBy()->sort()->reverse()->keys()->take(10);

        $famous_tracks = Track::withCount('courses')->whereIn('id', $famous_tracks_ids)->orderBy('courses_count', 'desc')->get();

        $user_courses_ids = User::findOrFail(7)->courses()->pluck('id');

        $user_tracks_ids = User::findOrFail(7)->tracks()->pluck('id');

        $recommended_courses = Course::whereIn('track_id', $user_tracks_ids)->whereNotIn('id', $user_courses_ids)->limit(4)->get();

        return view('Home', compact('user_courses', 'tracks','famous_tracks', 'recommended_courses'));
    }
}
