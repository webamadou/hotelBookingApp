<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function room(){
        return $this->belongsTo('App\Room');
    }

    public function customer(){
        return $this->belongsTo('App\Customer', 'user_id');
    }
}
