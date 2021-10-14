<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Track;
use App\Course;
use App\Video;
use App\Photo;
use App\Quiz;
use App\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        $users = factory('App\User', 5)->create();
        $tracks = factory('App\Track', 10)->create();

        foreach ($users as $user) {
            $tracks_ids = [];
            $tracks_ids[] = Track::all()->random()->id;
            $tracks_ids[] = Track::all()->random()->id;

            $user->tracks()->sync( $tracks_ids );
        }


        $courses = factory('App\Course', 50)->create();

        foreach ($users as $user) {
            $courses_ids = [];
            $courses_ids[] = Course::all()->random()->id;
            $courses_ids[] = Course::all()->random()->id;

            $user->courses()->sync( $courses_ids );
        }

        factory('App\Photo', 20)->create();
        factory('App\Video', 100)->create();

        $quizzes = factory('App\Quiz', 150)->create();

        foreach ($users as $user) {
            $quizzes_ids = [];
            $quizzes_ids[] = Quiz::all()->random()->id;
            $quizzes_ids[] = Quiz::all()->random()->id;

            $user->quizzes()->sync( $quizzes_ids );
        }

        factory('App\Question', 200)->create();
    }
}
