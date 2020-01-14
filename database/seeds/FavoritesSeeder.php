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
        \DB::table('favorites')->delete();

        $users=App\User::pluck('id')->all();
        $users_count=count($users);

        foreach (App\Question::all() as $question) {

            for($i=0 ;$i<rand(1,$users_count);$i++){
               $question->favorites()->attach($users[$i]);
            }
        }
    }
}
