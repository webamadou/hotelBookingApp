<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
    $date = date("Y-m-d H:i:s");
    $price_type = rand(0, 1);//The price type is either dynamic (1) or regular (0).
    $start_date = $end_date = null;
    $roomType = $roomCapacity = 0;
    if($price_type > 0){//Means price is set to be dynamic
        $start_date = $faker->dateTimeInInterval($startDate = '+1 years', $interval = '+ 5 days', $timezone = null);
        $end_date = $faker->dateTimeInInterval($startDate = '+1 years', $interval = '+ 5 days', $timezone = null);
    } else {
        $roomType = \App\RoomType::all()->random(1)->first();
        $roomCapacity = \App\RoomCapacity::all()->random(1)->first();
    }
    return [
        'name' => $faker->word,
        'price_value' => rand(100, 1000),
        'roomCapacity_id' => $roomCapacity,
        'roomType_id' => $roomType,
        'price_type' => $price_type,
        'price_range_start' => $start_date,
        'price_range_end' => $end_date,
    ];
});
