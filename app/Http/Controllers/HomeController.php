<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Order;
use App\Pengajuan;
use App\Penawaran;
use App\Pelanggan;
use App\Supplier;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Auth::user()->role == 'admin') {
            $product = Product::all();
            $order = Order::all();
            $pengajuan = Pengajuan::all();
            $pelanggan = Pelanggan::all();
            $supplier = Supplier::all();
            
            return view('index', [
                'product' => $product,
                'orders' => $order, 
                'pengajuan' => $pengajuan,
                'pelanggan' => $pelanggan,
                'supplier' => $supplier
            ]);

        } elseif (Auth::user()->role == 'supplier') {
            $pengajuan = Pengajuan::with('penawaran', 'supplier')->where('id_supplier', Auth::user()->supplier()->first()->id)->get();

            $penawaran = Penawaran::all();

            return view('index', [
                'pengajuan' => $pengajuan,
                'penawaran' => $penawaran
            ]);
        } else {

            $product = Product::all();

            return view('index', [
                'product' => $product,
            ]);
        }
    }

    
}
