<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

class VotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('votables')->delete();

       $users=App\User::all();
       $votes=[-1,1];

       foreach (Question::all() as $question) {
         for($i=0;$i<rand(1,$users->count());$i++){
            $user=$users[$i];
            $user->voteQuestion($question,$votes[rand(0,1)]);
         }
       }

       foreach (Answer::all() as $answer) {
         for($i=0;$i<rand(1,$users->count());$i++){
            $user=$users[$i];
            $user->voteAnswer($answer,$votes[rand(0,1)]);
         }
       }

    }
}
