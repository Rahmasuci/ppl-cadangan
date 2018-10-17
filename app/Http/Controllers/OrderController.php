<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('klien.order.index');
    }

    public function create(Product $id){
    	return view('klien.order.make',[
            'produk'=>$id
        ]);
    }

}
