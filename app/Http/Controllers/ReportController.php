<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Month;
use App\Year;
use App\Payment;
class ReportController extends Controller
{
    public function monthlyReport(){
        $years=Year::all();
        $months=Month::all();
        return view('report.monthlyReport',compact('years','months'));
    }

    public function searchMonthlyReport(Request $request){
        $payments=Payment::where('month_id',$request->month)
                            ->where('year_id',$request->year)
                            ->get();
        $payable=Payment::where('month_id',$request->month)
                            ->where('year_id',$request->year)
                            ->sum('payable_amount');
        $due=Payment::where('month_id',$request->month)
                            ->where('year_id',$request->year)
                            ->sum('due_amount');

        $years=Year::all();
        $months=Month::all();
        $month=Month::find($request->month);
        $year=Year::find($request->year);

        return view('report.monthlyReport',compact('years','months','payments','payable','due','month','year'));
    }

     public function yearlyReport(){
        $years=Year::all();
        return view('report.yearlyReport',compact('years'));
    }

    public function searchYearlyReport(Request $request){
        $payments=Payment::where('year_id',$request->year)
                            ->get();
        $payable=Payment::where('year_id',$request->year)
                            ->sum('payable_amount');
        $due=Payment::where('year_id',$request->year)
                            ->sum('due_amount');

        $years=Year::all();
        $year=Year::find($request->year);
        return view('report.yearlyReport',compact('years','payments','payable','due','year'));
    }


}
