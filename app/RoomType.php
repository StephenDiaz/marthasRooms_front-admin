<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_types';
    
    protected $fillable = [
        'roomType',
        'location',
        'roomCapacity',
        "image",
        "excess",
        
    ];
    
    public function room()
    {
        return $this->hasMany('App\Room','roomType');  
    }
    
    
    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'roomTypeId');
    }
   
}
