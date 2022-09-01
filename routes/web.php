<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\debtHistory;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\OmborxonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SotuvlarController;
use App\Http\Controllers\SotuvOfisiController;
use App\Models\filial;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Filial
Route::resource('/filial',FilialController::class)->names('filial')->middleware('role');
// Product
Route::resource('/product',ProductController::class)->names('product');
// category 
Route::resource('/category',CategoryController::class)->names('category');
// omborxona
Route::get('/category-all',[OmborxonaController::class,'index'])->name('category-all');
Route::get('/category-product/{id}',[OmborxonaController::class,'products'])->name('category-product');
Route::get('/omborxona-kirim/{id}',[OmborxonaController::class,'kirim'])->name('omborxona-kirim');
Route::post('/plus/{id}',[OmborxonaController::class,'omborxonaKirim'])->name('plus');

// debt
Route::resource('/debt',DebtController::class)->names('debt');
// debt history
Route::get('/history-debt/{id}',[debtHistory::class,'index'])->name('history-debt');
// Route::post('/price-debt',debtHistory::class,'price')->name('price-debt');

// user-delete
Route::delete('/user-delete/{id}',function($id){
    $user = User::find($id);
    if($user){
        $user->delete();
        return redirect()->route('filial.index');
    }
    return redirect()->back();
})->name('users-destroy');
// register
Route::get('/index-register',function(){
    $filial = filial::all();
    return view('filial.register',compact('filial'));
})->name('index-register')->middleware('role');

// shop 
Route::get('/shop-index',[SotuvOfisiController::class,'index'])->name('shop-index');
Route::get('/shop-search',[SotuvOfisiController::class,'search'])->name('shop-search');
Route::get('/shop-search-code',[SotuvOfisiController::class,'searchCode'])->name('shop-search-code');
Route::post('/karzina-plus',[SotuvOfisiController::class,'plusKarzina'])->name('karzina-plus');

Route::get('/karzina',[SotuvOfisiController::class,'karzina'])->name('karzina');
Route::post('/sale',[SotuvOfisiController::class,'sale'])->name('sale');
Route::get('/return',[SotuvOfisiController::class,'return'])->name('return');

// orders
Route::resource('/orders',SotuvlarController::class)->names('order');





// Auth
Route::get('/register',[AuthController::class,'indexRegister']);
Route::post('/register',[AuthController::class,'createRegister'])->name('register');
Route::post('/register-filial',[AuthController::class,'newFilial'])->name('new-filial');

