<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\debtHistory as history;

class debtHistory extends Controller
{
    //
    public function index($id){
        $debthistory = history::where('debt_id',$id)->get();
        return view('debt.history',compact('debthistory'));
    }
}
