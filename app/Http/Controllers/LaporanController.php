<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
   
    public function index(){

    	$order = Order::where('created_at')->count();
    	// dd($order);
    	return view('pages.laporan', [
    		'order'	=> $order
    	]);
    }

    public function bulan(){
    	
    	// $chart = Chart::Database(Order::all());
    	$order = Order::where('status', 'selesai')->get();
    	return view('pages.bulanan', ['order'=> $order]);
    }

    public function ajax(Request $req)
    {
    	$order = Order::
    }
}
