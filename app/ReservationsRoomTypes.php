<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationsRoomTypes extends Model
{
    protected $table = "reservations_room_types";
    protected $fillable = 
    [
        'reservation_id' , 'roomTypeId',
    ];
}
