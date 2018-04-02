<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reservation;
use App\Confirmation;
use Carbon\Carbon;
use DB;
use App\Guest;
use Charts;
use Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'frontDesk'){
            $count = Reservation::where('status' , 'pending')->count('id');
            $countDate = Reservation::whereDate('checkIn', '=', Carbon::today()->toDateString())->count('id');
            $northCambridge = DB::table('confirmations as c')->join('rooms as r', 'c.roomTypeId', '=' , 'r.roomType')->where('status' , 'check-in')->where('roomBuilding', 'North Cambridge')->count('c.id');
            $montinola = DB::table('confirmations as c')->join('rooms as r', 'c.roomTypeId', '=' , 'r.roomType')->where('status' , 'check-in')->where('roomBuilding', 'Montinola')->count('c.id');

            return view('home', compact('count', 'countDate', 'northCambridge', 'montinola'));
        }else{

            $guest = Guest::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
            $home = Charts::database(Guest::all(), 'bar', 'highcharts')
                    ->title("Guest Information")
                    ->elementLabel("Total Guests")
                    ->dimensions(0,400)
                    ->responsive(true)
                    ->groupByMonth(date('Y'), true);
            $reservation = Reservation::where(DB::raw("(DATE_FORMAT(created_at,'%Y') )"),date('Y'))->get();
            $reservation_chart = Charts::database(Reservation::all(), 'bar', 'highcharts')      
                    ->title("Reservation") 
                    ->elementLabel("Total Reservations")
                    ->dimensions(0,400) 
                    ->responsive(true)
                    ->groupBy('status');
            $confirmation = Confirmation::where(DB::raw("(DATE_FORMAT(created_at,'%Y') )"),date('Y'))->get();
            $confirmed_piechart = Charts::database(DB::table('confirmations')->join('room_types','confirmations.roomTypeId','=','room_types.id')->where('status','accepted')->get(), 'pie', 'highcharts')
                    ->title("Confirmed Guest")
                    ->labels(['North Cambridge','Montinola'])
                    ->dimensions(1000,500)
                    ->responsive(true)
                    ->groupBy('location');
                    

                
            
            return view('home', compact('home', 'reservation_chart','confirmed_piechart'));
        }
        
    }
}
