<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    $room = \App\Room::all()->random(1)->first();
    $customer = \App\Customer::all()->random(1)->first();
    $price = \App\Price::all()->random(1)->first();

    $date = date("Y-m-d H:i:s");
    $date_start = $faker->dateTimeInInterval($startDate = '+0 years', $interval = '+ 5 days', $timezone = null);
    $date_end = $faker->dateTimeInInterval($startDate = '+0 years', $interval = '+ 15 days', $timezone = null);
    return [
        'room_id' => $room->id,
        'date_start' => $date_start,
        'date_end' => $date_end,
        'user_id' => $customer->id,
        'price_id' => $price->id,
    ];
});
