<?php

namespace App\Http\Controllers;

use App\Year;
use App\Client;
use Illuminate\Http\Request;

class YearController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years=Year::orderBy('year','DESC')->get();
        return view('year.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('year.create');
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
            'year'=>'required|min:4|max:4|unique:years',

        ]);

        Year::create([
            'year'=>$request->year,
        ]);

        $notification=array(
            'messege'=>'Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('year.index')->with($notification);


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
        $year=Year::find($id);
        return view('year.edit',compact('year'));
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
            'year'=>'required|min:4|max:4',
        ]);

        Year::where('id',$id)->update([
            'year'=>$request->year,
        ]);

        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('year.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $year=Year::find($id);
        $year->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('year.index')->with($notification);
    }
}
