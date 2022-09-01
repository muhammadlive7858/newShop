<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // axios.post('https://checkout.test.paycom.uz/api')
        //     .then(function (result) {
            
        //     console.log(result)
            
        //     });
        // dd();
        return view('layouts.index');
    }
}
