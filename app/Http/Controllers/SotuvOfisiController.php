<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sotuvlar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SotuvOfisiController extends Controller
{
    public function index(){
        return view('shop.index');
    }
    public function search(Request $request){
        if($request->product === null){
            $product_name = Session::get('searchProduct');
            $product_name = end($product_name);
            // dd($product_name);
            if(Auth::user()->role === "DIRECTOR"){
                $product = Product::where('user_id',Auth::user()->id)->where('name','like','%'.$product_name.'%')->get();
                // dd($product); 
                if($product === []){
                    $product = Product::where('user_id',Auth::user()->id)->where('code','like','%'.$product_name.'%')->get();
                }
                return view('shop.products',compact('product'));
            }else{
                $product = Product::where('user_id',Auth::user()->parent_user_id)->where('name','like','%'.$product_name.'%')->get();
                return view('shop.products',compact('product'));
            }
        }else{
            Session::push('searchProduct',$request->product);
            if(Auth::user()->role === "DIRECTOR"){
                $product = Product::where('user_id',Auth::user()->id)->where('name','like','%'.$request->product.'%')->get();
                return view('shop.products',compact('product'));
            }else{
                $product = Product::where('user_id',Auth::user()->parent_user_id)->where('name','like','%'.$request->product.'%')->get();
                return view('shop.products',compact('product'));
            }
        }
        // $product = Product::where('name','like','%'.$request->product.'%')->get();
        // return view('shop.products',compact('product'));
    }
    public function searchCode(Request $request){
        Session::push('searchProduct',$request->product_code);
        if(Auth::user()->role === "DIRECTOR"){
            $product = Product::where('user_id',Auth::user()->id)->where('code','like','%'.$request->product_code.'%')->get();
            return view('shop.products',compact('product'));
        }else{
            $product = Product::where('user_id',Auth::user()->parent_user_id)->where('code','like','%'.$request->product_code.'%')->get();
            return view('shop.products',compact('product'));
        }
    }
    public function plusKarzina(Request $request){
        $product_id = $request->product_id;
        $count = $request->count;
        $price = $request->productprice;
        $product = Product::find($product_id);

        $shop = [
            "product_id"=>$product->id,
            "name"=>$product->name,
            "price"=>$price,
            "count"=>$count
        ];

        Session::push('karzina',$shop); 
        return redirect()->route('shop-search',Session::get('searchProduct'));
    }
    public function karzina(){
        $order = Session::get('karzina');
        // dd($order);
        return view('shop.karzina',compact('order'));
    }

    public function sale(Request $request){
        $order = Session::get('karzina');

        // dd(floatval($request->card));    

        $full = "";
        $savdo  = 0;
        $foyda = 0;
        // request
        $qaytim = 0;
        $client = 1;

        foreach($order as $order){
            $full = $full." ".$order['name']."__".$order['count']."ta __".$order['price']."so'mdan;";
            $savdo = $savdo + ($order['count'] * $order['price']);
            $foyda = $foyda + ($order['price'] - Product::find($order['product_id'])->price);
        }
        $store = Sotuvlar::create([
            'productsAndCounts'=>$full,
            'savdo'=>$savdo,
            'foyda'=>$foyda,
            'qaytimPuli'=>$qaytim,
            'clientId'=>1
        ]);
        if($store){
            Session::remove('karzina');
            return redirect()->route('shop-index');
        }else{
            return redirect()->back();
        }
    }

    public function return(){
        Session::remove('karzina');
        return redirect()->route('shop-index');
    }
}
