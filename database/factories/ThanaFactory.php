<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thana;
use App\District;
use Faker\Generator as Faker;

$factory->define(Thana::class, function (Faker $faker) {
    return [
      'district_id' => function(){
        return District::all()->random();
      },
      'name' => $faker->state,
    ];
});
