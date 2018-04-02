<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    
    protected $fillable = ['gLastname', 'gFirstname' , 'gMiddlename' , 'address' , 'gContactNumber', 'gEmail'];
    
    
    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'guestId' , 'id');  
    }
    public function confirmation()
    {
        return $this->hasMany('App\Reservation');  
    }
   

}
