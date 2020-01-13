<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Art;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Art::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'media' => Str::slug($faker->words(5, true)),
        'amount' => mt_rand(1000, 5000),
       	'user_id' => factory('App\User')->create()->id,
    ];
});
