<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\District;
use App\Division;
use Faker\Generator as Faker;

$factory->define(District::class, function (Faker $faker) {
    return [
        'division_id' => function(){
          return Division::all()->random();
        },
        'name' => $faker->state,
    ];
});
