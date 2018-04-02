<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use App\Guest;
use DB;
use Excel;   


    
class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestQuery= DB::table('guests')->where('status','enabled')->get();
        return view('guest.guest', compact('guestQuery'));
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
        if (Guest::where('gEmail', '=', Input::get('email'))->exists()) {
           DB::table('guests')->where('gEmail', Input::get('email') )->update(['status' => 'enabled']);
        }else{
            $guest = Guest::create([
                
                'gLastname' => request('lastname'),
                'gFirstname' => request('firstname'),
                'gMiddlename' => request('middlename'),    
                'address' => request('address'),
                'gContactNumber' => request('number'),
                'gEmail' => request('email'),   
                'status' => 'enabled' 

            ]);  
        }
        
        
         return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guestId = Guest::findOrFail($id)->id;

        $guest = Guest::where('id', $guestId)->first();

        return view('guest.guestProfile', compact('guest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function disable($id)
    {

       DB::table('guests')->where('id', Guest::findOrFail($id)->id )->update(['status' => 'disabled']);
    
       return back();
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

        $guest = Guest::findOrFail($id);

        $guest->gLastname = Input::get('gLastname');
        $guest->gFirstname = Input::get('gFirstname');
        $guest->gMiddlename = Input::get('gMiddlename');
        $guest->gContactNumber = Input::get('gContactNumber');
        $guest->address = Input::get('address');
        $guest->gEmail = Input::get('gEmail');

        $guest->save();
        

        $guestQuery= DB::table('guests')->where('status','enabled')->get();
       
        return view('guest.guest', compact('guestQuery'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
    }


    public function guestExport(){
        $guest = Guest::select('gLastname', 'gFirstname' , 'gMiddlename' , 'address' , 'gContactNumber', 'gEmail','status')->get();
        return Excel::create('data_guest', function($excel) use ($guest){
            $excel->sheet('mySheet', function($sheet) use ($guest){
                $sheet->fromArray($guest);
            });
        })->download('xls');
        return back();
    }
}