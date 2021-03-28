<?php

namespace App\Http\Controllers;

use App\Month;
use App\Year;
use Illuminate\Http\Request;

class MonthController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months=Month::orderBy('month','DESC')->get();
        return view('month.index',compact('months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('month.create');
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
            'month'=>'required|unique:months',

        ]);

        Month::create([
            'month'=>$request->month,
        ]);

        $notification=array(
            'messege'=>'Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('month.index')->with($notification);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $month=Month::find($id);
        return view('month.edit',compact('month'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'month'=>'required',
        ]);

        Month::where('id',$id)->update([
            'month'=>$request->month,
        ]);

        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('month.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $month=Month::find($id);
        $month->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('month.index')->with($notification);
    }
}
