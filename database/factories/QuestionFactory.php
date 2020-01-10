<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(rand(4,5)),
        'body'=>$faker->paragraphs(rand(3,7),true),
        'views_count'=>rand(0,5),
        'answers_count'=>rand(0,3),
        'votes_count'=>rand(-3,3)
    ];
});
