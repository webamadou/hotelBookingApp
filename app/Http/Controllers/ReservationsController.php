<?php

namespace App\Http\Controllers;

use App\RoomType;
use App\Room;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ReservationsController extends Controller
{
    public  function  roomTypeList(){
        $room_list = RoomType::pluck('name', 'id');

        return $room_list->toJson();
    }

    public function roomsList($room_type){
        $rooms = Room::select('name','image','id')->where('roomType_id', $room_type)->get();

        return $rooms->toJson() ;
    }
}
