<?php

namespace App\Http\Controllers;

use App\Models\Sotuvlar;
use Illuminate\Http\Request;

class SotuvlarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Sotuvlar::orderBy('id','desc')->get();
        return view('orders.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sotuvlar  $sotuvlar
     * @return \Illuminate\Http\Response
     */
    public function show(Sotuvlar $sotuvlar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sotuvlar  $sotuvlar
     * @return \Illuminate\Http\Response
     */
    public function edit(Sotuvlar $sotuvlar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sotuvlar  $sotuvlar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sotuvlar $sotuvlar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sotuvlar  $sotuvlar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sotuvlar $sotuvlar)
    {
        //
    }
}
