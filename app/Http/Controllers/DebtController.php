<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\debtHistory;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $debts = Debt::all();
        return view('debt.index',compact('debts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('debt.create');
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
        $validate = true;
        if($validate){
            $store = Debt::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'desc'=>$request->desc,
                'debt'=>$request->debt,
                'generalDebt'=>$request->debt
            ]);
            if($store){
                return redirect()->route('debt.index');
            }else{
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $debt = Debt::find($id);
        return view('debt.price',compact('debt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $validate = true;
        if($validate){
            $debt = Debt::find($id);
            $oldDebt = $debt->debt;
            $update = $debt->update([
                'debt'=>$oldDebt - floatval($request->price)
            ]);
            if($update){
                debtHistory::create([
                    'debt_id'=>$debt->id,
                    'summa'=>$request->price
                ]);
                return redirect()->route('debt.index');
            }
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debt  $debt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Debt::find($id)->delete();
        if($delete){
            debtHistory::where('debt_id',$id)->delete();
            return redirect()->back();
        }
        return redirect()->back();
    }
}
