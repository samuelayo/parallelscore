<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('investor');
    }


    public function dashboard(){
        return "hello";
    }

}
