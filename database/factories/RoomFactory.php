<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    $roomType = \App\RoomType::all()->random(1)->first();
    $roomCapacity = \App\RoomCapacity::all()->random(1)->first();
    //The room names are set this way: A2, B3, C7 ...
    //We then need to generate those name by definig an  array with letters. We will then iterate through that array and fill another array with the room's names
    $alphaRoom = ['A','B','C','D','E','F','G','H','I','J','K','L'];
    $roomsArray = [];
    foreach ($alphaRoom as $alpha){
        for ($i = 0; $i< 10; $i++) {
            $roomsArray[] = $alpha.$i;
        }
    }
    #dd($roomsArray);
    return [
        'name'              => $roomsArray[array_rand($roomsArray, 1)],
        'roomType_id'       => $roomType->id,
        'roomCapacity_id'   => $roomCapacity->id,
        'image'             => 'room_images/default.jpg'
    ];
});
