<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   Session::remove('user');
        if(Auth::user()->role === "DIRECTOR"){
            $products = Product::where('user_id',Auth::user()->id)->get();
            return view('product.index',compact('products'));
        }else{
            $products = Product::where('user_id',Auth::user()->parent_user_id)->get();
            return view('product.index',compact('products'));
        }
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
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->input());

        $validate = true;
        if($validate){
            if(Auth::user()->role === "DIRECTOR"){
                $store = Product::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    'price'=>$request->price,
                    'count'=>$request->count,
                    'past'=>$request->priceOne,
                    'orta'=>$request->priceTwo,
                    'yuqori'=>$request->priceThree,
                    'user_id'=>Auth::user()->id,
                    'code'=>$request->code
                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return redirect()->back();
                }
            }else{
                $store = Product::create([
                    'name'=>$request->name,
                    'category_id'=>$request->category_id,
                    'price'=>$request->price,
                    'count'=>$request->count,
                    'past'=>$request->priceOne,
                    'orta'=>$request->priceTwo,
                    'yuqori'=>$request->priceThree,
                    'user_id'=>Auth::user()->parent_user_id,
                    'code'=>$request->code
                ]);
                if($store){
                    return redirect()->route('product.index');
                }else{
                    return redirect()->back();
                }
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->parent_user_id === 0){
            $product = Product::where('user_id',Auth::user()->id)->get();
            $category = Category::where('user_id',Auth::user()->id)->get();
        }else{
            $product = Product::where('user_id',Auth::user()->parent_user_id)->get();
            $category = Category::where('user_id',Auth::user()->parent_user_id)->get();
        }
        return view('product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // validate
        $product = Product::find($id);
        if($product){
            $update = Product::create([
                'name'=>$request->name,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'count'=>$request->count,
                
                'past'=>$request->priceOne,
                'orta'=>$request->priceTwo,
                'yuqori'=>$request->priceThree
            ]);
            if($update){
                return redirect()->route('product.index');
            }else{
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Product::find($id)->delete();
        if($delete){
            return redirect()->route('product.index');
        }else{
            return redirect()->back();
        }
    }
}
