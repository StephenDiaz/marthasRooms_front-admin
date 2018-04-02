<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Room;
use App\RoomType;
use App\Reservation;
use DB;
use File;
use Carbon\Carbon;
use App\Price;
use App\Promo;
use App\Guest;
use Calendar;




class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rmType = RoomType::all();
       
        $room = Room::all();

       
        
        
        return view('room.mainRoom', compact('room', 'rmType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'rmName' => 'required',
            'location' => 'required',
            'pax' => 'required',
            'image' => 'required', 
            'excess' => 'required'

     
        ]);

        if($request->hasFile('image'))
        {
            $destinationPath="uploads";
            $file = $request->image;
            $extension=$file->getClientOriginalExtension();
            $fileName = rand(1111,9999).".".$extension;
            $file->move($destinationPath,$fileName);
            $image = $fileName;

        }
        
        $r = RoomType::create([
            'image' => $image,
            'roomType' => request('rmName'),
            'location' => request('location'),
            'roomCapacity' => request('pax'),
            'excess' => request('excess'),
            


        ]);




        for ($i=0; $i < count($request->input('priceD')); ++$i) 
        {
                $price = new Price;        
                $price->numberOfPerson =  $request->input('personD')[$i];
                $price->amount = $request->input('priceD')[$i];
                $price->type = $request->input('type')[$i];
                $price->roomType = $r->id;
                $price->save();  
        }

      
      return back();

        
        // if( count($request->input('inputStart')) < 0){

        //     return back();
            
        // }else{
        //     for ($i=0; $i < count($request->input('amt')); ++$i) 
        //     {
        //             $promo = new Promo;        
        //             $promo->dateStart =  $request->input('inputStart')[$i];
        //             $promo->dateEnd =  $request->input('inputEnd')[$i];
        //             $promo->person =  $request->input('person');[$i];
        //             $promo->totalAmount = $request->input('amt')[$i];
        //             $promo->roomType = $r->id;
        //             $promo->save();  
        //     } 
        //       return back(); 


        // }
               
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guest = Guest::all();
        $roomType = RoomType::findOrFail($id);
        $room = Room::where('roomType', $id)->get();


        $event_list = [];
        $events = Reservation::where('roomTypeId', $id)->get();
        

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


        return view('room.rooms')->with(compact('roomType','room', 'calendar_details', 'guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        $price = DB::table('room_types')->select('*')->join('prices','room_types.id','=','prices.roomType')->where('room_types.id', $id)->get();
        return view('room.editRoomType', compact('roomType', '$price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $roomType = RoomType::findOrFail($id);

        $roomType->roomType = Input::get('roomType');
        $roomType->location = Input::get('location');
        $roomType->roomCapacity = Input::get('roomCapacity');
        $roomType->excess = Input::get('excess');
     

        $roomType->save();
    
       
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $room = Room::findOrFail($request->room_id);
        $room->delete();

        return back();
    }
}