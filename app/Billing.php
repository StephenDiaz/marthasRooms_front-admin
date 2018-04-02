<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
	protected $fillable = [];
    public function reservation()
    {
        return $this->hasMany('App\Reservation', 'reservation_id', 'id'); 
    }
}
