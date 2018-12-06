<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use PDF;

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

      // return PDF::loadView('pages.laporan', [
      //   'data'=>$order
      // ])->download('laporan.pdf'); 
    	
    	// echo "string";
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert());
        return $pdf->stream();
      // return PDF::loadView('pages.laporan', [
      //   'data'=>$order
      // ])->download('laporan.pdf'); 
    }

    public function convert()
    {
      $order = Order::with('orderdetail.product', 'pelanggan')->get();
      $output = '
        <h3 align="center">Laporan Bulanan</h3>
          <table width="100%" style="border-collapse: collapse; border:0px;">
                  <tr>
                    <th style="border= 1px solid; padding=12px;" width="15%">Pelanggan</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Alamat Pengiriman</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Produk</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Kuantitas</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Harga Total</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Tgl Pesan</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Tgl Selesai</th>
                    <th style="border= 1px solid; padding=12px;" width="15%">Status</th>
                  </tr>
      ';
      foreach ($order as $o) 
      {
        $output .= '
          <tr>
            <td>'.$o->pelanggan->nama.'</td>
            <td>'.$o->alamat_pengiriman.'</td>
        ';
      foreach ($o->orderdetail as $od) 
      {
        $output .= '
          <td>'.$od->product->nama_produk.'</td>
          <td>'.$od->kuantitas.'</td>
          <td>'.$od->total.'</td>
        ';
      }
      foreach ($order as $o) 
      {
        $output .= '
            <td>'.$o->created_at.'</td>
            <td>'.$o->tgl_selesai.'</td>
            <td>'.$o->status.'</td>
            </tr>
        ';
      }
         
      }
      $output .= '</table>';
      return $output;
    }
}
