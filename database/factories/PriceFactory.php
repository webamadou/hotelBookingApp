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
        //We define start date = today plus 7 to 15 days
        $start_date = date('Y-m-d H:i:s', strtotime($date. rand(7, 15)));
        //We define end date = today + 20 to 31 days
        $end_date = date('Y-m-d H:i:s', strtotime($date. rand(20, 31)));
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
