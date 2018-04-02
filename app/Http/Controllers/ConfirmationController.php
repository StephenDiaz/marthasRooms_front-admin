<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Confirmation;
use App\Guest;
use App\RoomType;
use App\Billing;


class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmation = Confirmation::where('status','<>','checkOut')->orderByRaw("FIELD(status , 'pending', 'checkIn') ASC")->get();
 
        
        return view('frontDesk.confirmation.confirmation', compact('confirmation'));
    }

    public function checkIn($id)
    {

       DB::table('confirmations')->where('id', Confirmation::findOrFail($id)->id )->update(['status' => 'checkIn']);
    
        return back();
    }


     public function checkOut($id)
    {

        DB::table('confirmations')->where('id', Confirmation::findOrFail($id)->id )->update(['status' => 'checkOut']);
    
        return back();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
