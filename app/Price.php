<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = [];

    public function roomType(){
        return $this->belongsTo('App\RoomType', 'roomType_id');
    }

    public function roomCapacity(){
        return $this->belongsTo('App\RoomCapacity', 'roomCapacity_id');
    }
}
