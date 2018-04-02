<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
	protected $fillable =['reserveId','guestId','roomTypeId','status'];
    

    public function guest()
    {
        return $this->belongsTo( 'App\Guest' , 'guestId');  
    }

    public function reserve()
    {
        return $this->belongsTo( 'App\Reservation' , 'reserveId');  
    }
}
