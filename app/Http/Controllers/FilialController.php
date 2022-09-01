<?php

namespace App\Http\Controllers;

use App\Models\filial;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role === "DIRECTOR"){
            $filials = filial::where('user_id',Auth::user()->id)->get();
            return view('filial.index',compact('filials'));
        }else{
            $filials = filial::where('user_id',Auth::user()->parent_user_id)->get();
            return view('filial.index',compact('filials'));
        }
        // return view('filial.index',compact('filials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        if(Auth::user()->role === "DIRECTOR"){
            $store = filial::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'user_id'=>Auth::user()->id
            ]);
        }else{
            $store = filial::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'user_id'=>Auth::user()->parent_user_id
            ]);
        }
        if($store){
            return redirect()->route('filial.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = User::where('filial_id',$id)->get();
        return view('filial.users',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function edit(filial $filial)
    {
        return view('filial.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        // validate
        $filial = filial::where('id',$id)->get();
        $update = $filial->update([
            'name'=>$request->name,
            'desc'=>$request->desc
        ]);
        if($update){
            return redirect()->route('filial.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $filial = filial::find($id);
        $delete = $filial->delete();
        if($delete){
            $user = User::where('filial_id',$id);
            foreach($user as $user){
                if($user->parent_user_id !== 0){
                    $user->delete();
                }else{
                }
            }
            return redirect()->route('filial.index');
        }else{
            return redirect()->back();
        }
    }
}
