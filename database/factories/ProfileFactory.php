<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'about'=>$faker->paragraphs(rand(2,3),true),
        'avatar'=>asset('storage/default').'/avatar.jpeg',
        'city'=>$faker->city,
        'address'=>$faker->address,
        'phone_number'=>$faker->phoneNumber
    ];
});
