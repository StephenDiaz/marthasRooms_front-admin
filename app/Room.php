<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    
    protected $table = "rooms";

    protected $fillable =[
        'roomNumber',
        'roomType',
        'roomBuilding',
        'roomStatus',

    ];

    
    
    public function rmTypes(){
        
        return $this->belongsTo('App\roomType', 'roomType', 'id');  
    
    }
    
    public function roomInventory(){
        
        return $this->belongsTo('App\RoomInventory', 'roomInventory_id' , 'id');  
    }
    
    public function building()
    {
        return $this->belongsTo('App\Building', 'bldgId' , 'id');  
    }
   
    public function reservation()
    {
        return $this->belongsToMany('App\Reservation' , 'reservation_id');  
    }
    
}
