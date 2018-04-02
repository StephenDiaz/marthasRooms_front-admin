<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


use Illuminate\Http\Request;
use App\Reservation;
use App\Confirmation;
use App\Price;
use App\Guest;
use App\RoomType;
use App\ReservationsRoomTypes;
use App\Inventory;

use App\Billing;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservation = Reservation::orderByRaw("FIELD(status , 'pending', 'accepted', 'cancelled') ASC")->get();

        $guest = Guest::all();
     
        $roomType = RoomType::all();
      
        $inventory = Inventory::all();
        
        return view('frontDesk.reservation.reservation', compact('inventory', 'roomType','reservation','guest'));
    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
			'name' => 'required',
			'roomType' => 'required', 
			'in' => 'required', 
			'out' => 'required', 
			'adult' => 'required', 
			'children' => 'required', 
	 
		]);

        $roomTypeId = request('roomType');
        $adult = request('adult');
        $children = request('children');

		
		$reserve = Reservation::create([
                'roomTypeId' => $roomTypeId,
                'checkIn' => request('in'),
                'checkOut' => request('out'),
                'noOfAdults' => $adult,
                'noOfChildren' => $children,
                'aditionalInfo' => request('info'),
                'guestId' => request('name'),

        ]);

        ReservationsRoomTypes::create([
                'reservation_id' => $reserve->id,
                'roomTypeId' => request('roomType'),

        ]);

        return back();

        // $queryPrice = Price::where('roomType', $roomTypeId)->where('numberOfPerson','<=','$adult')->get();

        // dd($queryPrice); 
       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$reservation = Reservation::findOrFail($id)->get();

        $reservationId =  Reservation::findOrFail($id)->guestId;
       

       return view('frontDesk.reservation.guestInfo', compact('reservation','reservationId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        
		
    }

    public function reservationShow($id)
    {
        
        $billingId =  Billing::findOrFail($id)->get();
       

        return view('frontDesk.reservation.accept', compact('reservation','billingId'));
    }
	
    public function accept($id)
    {

        DB::table('reservations')->where('id', Reservation::findOrFail($id)->id )->update(['status' => 'accepted']);

        $g = Reservation::find($id)->guestId;
        $r = Reservation::find($id)->roomTypeId;
        $c = Confirmation::create([

            'reserveId' => $id,
            'guestId'   => $g,
            'roomTypeId' => $r
        ]);

    
       return back();
    }


    public function undo($id)
    {
        if(Reservation::findOrFail($id)->status == 'accepted')
        {
            $confirm = Confirmation::where('reserveId', $id);
            $confirm->delete();
        }
        
        DB::table('reservations')->where('id', Reservation::findOrFail($id)->id )->update(['status' => 'pending']);
        
        return back();
    }

    public function cancel($id)
    {

       DB::table('reservations')->where('id', Reservation::findOrFail($id)->id )->update(['status' => 'cancelled']);
    
       return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
         
		
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
