<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Year;
class DueController extends Controller
{
    public function index(){
        $years=Year::all();
        return view('due.index',compact('years'));
    }

    public function yearlyCustomerDue(Request $request){
        $customers=Client::all();
        $years=Year::all();
        $year=$request->year;
        return view('due.index',compact('years','customers','year'));
    }
}
