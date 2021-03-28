<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Client;
use App\Year;
use App\Month;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::with('client','year','month')->get();
        // return $payments;
        return view('payment.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers=Client::all();
        $years=Year::all();
        $months=Month::all();
        return view('payment.create',compact('customers','years','months'));
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
            'customer'=>'required',
            'year'=>'required',
            'month'=>'required',
            'total_amount'=>'required|numeric',
            'payable_amount'=>'required|numeric',
            'date'=>'required',
        ]);

        $available=Payment::where('client_id',$request->customer)->where('year_id',$request->year)->where('month_id',$request->month)->count();

        if($available==0){
            Payment::create([
                'invoice'=>rand(999,99999),
                'client_id'=>$request->customer,
                'year_id'=>$request->year,
                'month_id'=>$request->month,
                'payable_amount'=>$request->payable_amount,
                'due_amount'=>$request->total_amount - $request->payable_amount,
                'date'=>$request->date
            ]);

            $notification=array(
                'messege'=>'Created SuccessfullY',
                'alert-type'=>'success'
                 );

            return Redirect()->route('payment.create')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Oppss !! Already Payment this month',
                'alert-type'=>'error'
                 );

            return Redirect()->route('payment.create')->with($notification);
        }



    }


    // monthly payment history
    public function monthlyPayment(){
        $years=Year::all();
        $months=Month::all();
        return view('payment.monthlyPayment',compact('years','months'));
    }

    public function searchMonthlyPayment(Request $request){
        $payments=Payment::where('month_id',$request->month)
                            ->where('year_id',$request->year)
                            ->get();
        $years=Year::all();
        $months=Month::all();
        return view('payment.monthlyPayment',compact('years','months','payments'));
    }

    // yearly payment history
    public function yearlyPayment(){
        $years=Year::all();
        return view('payment.yearlyPayment',compact('years'));
    }

    public function searchYearlyPayment(Request $request){
        $payments=Payment::where('year_id',$request->year)
                            ->get();
        $years=Year::all();
        return view('payment.yearlyPayment',compact('years','payments'));
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
