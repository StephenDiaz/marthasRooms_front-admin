<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Feedback;
use Input;
use DB;
use Excel; 
    
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbackQuery= Feedback::all();
        return view('feedback.feedback', compact('feedbackQuery'));

    }
    public function disable($id)
    {

       DB::table('feedback')->where('id', Feedback::findOrFail($id)->id )->update(['status' => 'disabled']);
    
       return back();
    }

    public function enable($id)
    {

       DB::table('feedback')->where('id', Feedback::findOrFail($id)->id )->update(['status' => 'enabled']);
    
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
        $feedback = Feedback::create([
            
            'name' => request('name'),
            'email' => request('email'),
            'subject' => request('subject'),    
            'Message' => request('Message')
            

        ]);
        
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
        $feedbackId = Feedback::findOrFail($id)->id;

        $feedback = Feedback::where('id', $feedbackId)->first();

        return view('feedback.feedbackProfile', compact('feedback'));
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
        $feedback = Feedback::findOrFail($id);

        $feedback->update($request->all());
        $feedback->save();

        $feedbackQuery= Feedback::all();
        
        return view('feedback.feedback', compact('feedbackQuery'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $feedback = Feedback::findOrFail($request->feedback_id);
        $feedback->delete();

        return back();
    }
    public function feedbackExport(){
        $feedback = Feedback::select('name','email','subject','Message')->get();
        return Excel::create('data_feedback', function($excel) use ($feedback){
            $excel->sheet('mySheet', function($sheet) use ($feedback){
                $sheet->fromArray($feedback);
            });
        })->download('xls');

        return back();
    }
}