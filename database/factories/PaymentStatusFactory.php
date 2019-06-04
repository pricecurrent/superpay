<?php

use Faker\Generator as Faker;

$factory->define(App\PaymentStatus::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'label' => $faker->word,
        'description' => $faker->sentence,
    ];
});
