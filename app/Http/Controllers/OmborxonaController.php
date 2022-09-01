<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OmborxonaController extends Controller
{   
    // category 
    public function index(){
        if(Auth::user()->role === "DIRECTOR"){
            $categories = Category::where('user_id',Auth::user()->id)->get();
            return view('omborxona.category.index',compact('categories'));
        }else{
            $categories = Category::where('user_id',Auth::user()->parent_user_id)->get();
            return view('omborxona.category.index',compact('categories'));
        }
    }
    public function products($id){
        $products = Product::all()->where('category_id',$id);
        // dd($products);
        return view('omborxona.category.product',compact('products'));
    }

    // kirim
    public function kirim($id){
        return view('omborxona.productPlus.index',compact('id'));
    }
    public function omborxonaKirim($id,Request $request){
        // dd("");
        $product = Product::find($id);
        $count = $product->count;
        $product_id= $product->id;
        $category = $product->category_id;
        $kirim = $product->update([
            'count'=>floatval($count) + floatVal($request->count),
        ]);
        if($kirim){
            return redirect()->route('category-product',$category); 
        }else{
            return redirect()->route('omborxona-kirim',$product_id);
        }
    }
}
