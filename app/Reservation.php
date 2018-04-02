<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    
    protected $fillable = ['noOfAdults', 'noOfChildren' , 'checkIn' , 'checkOut' , 'additionalInfo', 'status','billingId', 'roomTypeId', 'guestId',];
    
    
    public function guests()
    {
        return $this->belongsTo('App\Guest', 'guestId');  
    }
    public function billing()
    {
        return $this->belongsTo('App\Billing', 'billingId');  
    }
    
    public function roomTypes()
    {
        return $this->belongsTo('App\RoomType', 'roomTypeId','id');  
    }

    public function confirm()
    {
        return $this->hasOne('App\Confirmation', 'reserve','id');  
    }

    
}
