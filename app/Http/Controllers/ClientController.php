<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Client::all();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'name'=>'required',
            'phone'=>'required|numeric|unique:clients',
            'address'=>'required',
            'house_number'=>'required',
            'registration_date'=>'required',
        ]);

        Client::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'house_number'=>$request->house_number,
            'registration_date'=>$request->registration_date,
        ]);

        $notification=array(
            'messege'=>'Created SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('customer.index')->with($notification);


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
        $client=Client::find($id);
        return view('customer.edit',compact('client'));
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
            'name'=>'required',
            'phone'=>'required|numeric|unique:clients,phone,'.$id,
            'address'=>'required',
            'house_number'=>'required',
            'registration_date'=>'required',
        ]);

        Client::where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'house_number'=>$request->house_number,
            'registration_date'=>$request->registration_date,
        ]);

        $notification=array(
            'messege'=>'Updated SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('customer.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $client->delete();
        $notification=array(
            'messege'=>'Deleted SuccessfullY',
            'alert-type'=>'success'
             );

        return Redirect()->route('customer.index')->with($notification);
    }
}
