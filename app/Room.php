<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Room belongs to a roomType
    public function roomType(){
        return $this->belongsTo('App\RoomType', 'roomType_id');
    }
    //Room belongs to a room capacity
    public function roomCapacity(){
        return $this->belongsTo("App\RoomCapacity", "roomCapacity_id");
    }
}
