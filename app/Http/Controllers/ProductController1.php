<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$arr['product'] = Product::all();
    	return view('product.list')->with($arr);
    }

    public function add(Request $req){
        // dd($req);
        $product = Product::find($req->id);
        $product->nama_produk = $req->nama_produk;
        $product->harga_perkilo = $req->harga_perkilo;
        $product->save();
        
        return redirect('/product');
    }

    public function edit(Request $req){
    	// dd($req);
    	$product = Product::find($req->id);
    	$product->nama_produk = $req->nama_produk;
    	$product->harga_perkilo = $req->harga_perkilo;
    	$product->save();
    	
    	return redirect('/product');
    }
}
