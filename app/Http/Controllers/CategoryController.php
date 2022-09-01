<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->parent_user_id === 0){
            $category = Category::where('user_id',Auth::user()->id)->get();
        }else{
            $category = Category::where('user_id',Auth::user()->parent_user_id)->get();
        }
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->parent_user_id === 0){
            $category = Category::where('user_id',Auth::user()->id)->get();
        }else{
            $category = Category::where('user_id',Auth::user()->parent_user_id)->get();
        }
        return view('category.create',compact('category'));
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
        // dd($request->input());
        if(Auth::user()->parent_user_id === 0){
            $store = Category::create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'desc'=>$request->desc,
                'user_id'=>Auth::user()->id
            ]);
            if($store){
                return redirect()->route('category.index');
            }else{
                return redirect()->back();
            }
        }else{
            $store = Category::create([
                'name'=>$request->name,
                'parent_id'=>$request->parent_id,
                'desc'=>$request->desc,
                'user_id'=>Auth::user()->parent_user_id
            ]);
            if($store){
                return redirect()->route('category.index');
            }else{
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //validate
        $category = Category::find($id);
        $store = $category->create($request->input());
        if($store){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        $delete = $category->delete();
        if($delete){
            return redirect()->route('category.index');
        }else{
            return redirect()->back();
        }
    }
}
