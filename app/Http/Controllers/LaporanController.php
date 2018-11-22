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
    	// $order = Order::where('status', 'selesai')->get();
    	return view('pages.bulanan'
    		// , ['order'=> $order]
    	);
    }

    public function getAjax(Request $req)
    {
    	$order = Order::whereMonth('created_at', $req->bulan)->whereYear('created_at', $req->tahun)->get();
    	foreach ($order as $o){
        	echo '<tr>';
                  echo '<td>'.$o->pelanggan->nama.'</td>';
                  echo '<td>'.$o->alamat_pengiriman.'</td>';
                  foreach ($o->orderdetail as $od){
	                  echo '<td>'.$od->product->nama_produk.'</td>';
	                  echo '<td>'.$od->kuantitas.'</td>';
	                  echo '<td>'.$od->total.'</td>';
                  }
                  echo '<td>'.$o->created_at.'</td>';
                  echo '<td>'.$o->tgl_selesai.'</td>';
                  echo '<td>'.$o->status.'</td>';
            echo '</tr>';
    	}
    	
    	// echo "string";
    }
    
}
