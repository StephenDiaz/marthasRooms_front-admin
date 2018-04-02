<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomInventory extends Model
{
    $protected $table = 'roomInventories';
    
    public function room()
    {
        return $this->hasMany('App\Room', 'roomInventory_id', 'id');  
    }
}
