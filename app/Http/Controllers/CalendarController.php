<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Reservation;


use Calendar;

class CalendarController extends Controller
{
    public function index(){

        $event_list = [];
        $events = Reservation::all();
        

        foreach ($events as $key => $event){
            $id = $event->guestId;
           

            $event_list[] = Calendar::event(

                $event->guests->gLastname,
                true,
                new \DateTime($event->checkIn),
                new \DateTime($event->checkOut.' +1 day'),
                $event->id
        );
    }

        $calendar_details = Calendar::addEvents($event_list);

        return view('frontDesk.calendar.calendar', compact('calendar_details','events'));
    }  

    
}