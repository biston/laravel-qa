<?php

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,3)->create()->each(function($user){
            $user->questions()
                 ->saveMany(
                     factory(App\Question::class,rand(3,5))->make()
                  )
                  ->each(function($question){
                         $question->answers()
                                  ->saveMany(
                                      factory(App\Answer::class,rand(0,5))->make()
                                );
                     });

        })->each(function($user){
            $user->profile()
                 ->save(
                      factory(App\Profile::class)->make()
                 );
        });
    }
}
