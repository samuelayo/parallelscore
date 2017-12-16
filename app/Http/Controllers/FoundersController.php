<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companies;

class FoundersController extends Controller
{
    //

    public function dashboard(Request $request){
        $company = companies::where('user_id', auth()->user()->id)->first();
        return view('founders.dashboard', compact('company'));
    }
}
