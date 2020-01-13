<?php

use Illuminate\Database\Seeder;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=App\User::pluck('id')->all();
        $users_count=count($users);

        foreach (App\Question::all() as $question) {

            for($i=0 ;$i<=rand(0,$users_count);$i++){
                $question->favorites()->attach($users[$i]);
            }
        }
    }
}
