<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory -> define(Payment::class, function (Faker $faker) {
    return [
        'firstname' => $faker -> firstName(),
        'lastname' => $faker -> lastName(),
        'email' => $faker -> safeEmail(),
        'address' => $faker -> streetAddress(),
        'total_price' => $faker -> numberBetween($min = 1000, $max = 20000),
        'status' => rand(0,1),
        'note' => $faker -> paragraph()
    ];
});
