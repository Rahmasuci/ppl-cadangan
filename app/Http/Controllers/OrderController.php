<?php

namespace App\Http\Controllers;


use App\Product;
use Auth;
use App\Order;
use App\OrderDetail;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if(Auth::user()->role == 'admin'){
            $data = Order::with('orderdetail.product', 'pelanggan')->get();
        }
        else{
            $data = Order::with('orderdetail.product', 'pelanggan')->where('id_pelanggan', Auth::user()->pelanggan()->first()->id)->get();
        }

        // dd($data);
            
        // $order = Order::all();
        return view('order.list', [
            'data'      => $data,
            'tittle'    => 'List Order',
            'active'    => 'order.list',
            // 'createLink'=> route('order.create')
        ]);
        // return view('order.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
       // dd($r->all());
       //  $produk = Product::find($r->input('id'));
       //  return view('order.make',[
       //      'tittle'        => 'Tambah Pesanan',
       //      'modul_link'    => route('order.index'),
       //      'modul'         => 'Order',
       //      'action'        => route('order.store'),
       //      // 'active'        => 'order.index'
       //  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       
         // dd($request);
        $produk = Product::find($id);

        $request->validate([
            'produk' => $produk,
            'kuantitas' => 'required',
            'total' => 'required',
            'alamat_pengiriman' => 'required'
            
        ]);
        $order = Order::create([
            'alamat_pengiriman' => $request->alamat_pengiriman,
            'status'            => 'belum diverifikasi',
            'id_pelanggan'       => Auth::user()->pelanggan->id,
        ]);

        OrderDetail::create([
            'kuantitas' => $request->kuantitas,
            'total'     => $request->total,
            'id_order'  => $order->id,
            'id_produk' => $produk->id,
        ]);


        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function tambah($id)
    {
       // dd($id);
        $produk = Product::find($id);
        return view('order.make',[
            'produk'        => $produk,
            'tittle'        => 'Tambah Pesanan',
            'modul_link'    => route('order.index'),
            'modul'         => 'Order',
            'action'        => route('order.store'),
            'active'        => 'order.index'
        ]);
    }

    public function verifikasi(Request $request, $id){

        $order = Order::find($id);

        $order->update([
            'status'=>'terverifikasi',
        ]);

       return redirect()->back()->with('success_msg','Member berhasil diverifikasi');  
    }
}
