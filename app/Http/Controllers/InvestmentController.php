<?php

namespace App\Http\Controllers;

use App\companies;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('investor');
    }


    public function dashboard(){
        $companies = companies::paginate('15');
        $amount = "Amount";
        return view('investor.dashboard')->with(compact('companies','amount'));
    }

    public function search_investment(Request $request){
        $this->validate($request,[
            'amount' => 'required|numeric'
        ]);

        //after validation carry out the search
        $companies = companies::wherebetween("company_amount",[0,$request->amount])->paginate(15);
        $amount = $request->amount;

        return view('investor.dashboard')->with(compact('companies','amount'));
    }

    public function view_company($id){
        $company = companies::where('id',$id)->first();

        return view('investor.company')->with(compact('company'));
    }

}
