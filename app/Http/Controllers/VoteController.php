<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vote_question(Question $question,Request $request){

        auth()->user()->voteQuestion($question,$request->vote);
        return back();
    }

    public function vote_answer(Answer $answer,Request $request){

        auth()->user()->voteAnswer($answer,$request->vote);
        return back();
    }
}
