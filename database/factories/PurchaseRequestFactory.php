<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PurchaseRequest;
use Faker\Generator as Faker;

$factory->define(PurchaseRequest::class, function (Faker $faker) {
    return [
		'art_id'           => factory('App\Art')->create()->id,
		'name'             => $faker->name,
		'email'            => $faker->unique()->safeEmail,
		'accepted_at'      => null,
		'paid_at'          => null,
		'fulfilled_at'     => null,
		'rejected_at'      => null,
		'rejection_reason' => null,
    ];
});
