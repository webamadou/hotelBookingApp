<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Room belongs to a roomType
    public function roomType(){
        return $this->belongsTo(RoomType::class);
    }
    //Room belongs to a room capacity
    public function roomCapacity(){
        return $this->belongsTo(RoomCapacity::class);
    }
}
