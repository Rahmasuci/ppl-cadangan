<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
use App\Penawaran;
use Auth;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        // if(Auth::user()->role == 'admin'){
        $data = Penawaran::with('orderdetail')->get();
        // }
        // else{
        //     $data = Penawaran::with('orderdetail', 'supplier')->where('id_supplier', Auth::user()->supplier()->first()->id)->get();
        // }
        return view('penawaran.list', [
            'data'      => $data,
            'tittle'    => 'List Penawaran',
            'active'    => 'penawaran.list',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // $order = Order::find($id);

        // return view('penawaran.make', [
        //     'order' => $order,
        // ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        
        $orderdetail = OrderDetail::find($id);

        $request->validate([
            'orderdetail'   => $orderdetail,
            'qty_butuh'     => 'required',
            'hrg_max'       => 'required'
        ]);

        // dd($id);
        $penawaran = Penawaran::create([
            'qty_butuh' => $request->qty_butuh,
            'hrg_max'     => $request->hrg_max,
            'status'    => 'cari supplier',
            'id_detail'  => $orderdetail->id,
        ]);

        return redirect()->route('penawaran.index');
        
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
        $penawaran = Penawaran::find($id);
        $request->validate([
            'qty_butuh' => 'required|String',
            'hrg_max' => 'required|String',
        ]);

         $penawaran->update([
            'qty_butuh' => $request->qty_butuh,
            'hrg_max' => $request->hrg_max,
        ]);

        return redirect()->route('penawaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $penawaran = Penawaran::find($id);
        $penawaran->delete($id);

        return redirect()->route('penawaran.index');
    }

     public function tambah(Request $request, $id)
    {
        $orderdetail = OrderDetail::find($id);

        // dd($order);
        return view('penawaran.make', [
            'orderdetail' => $orderdetail,
            'status' => 'cari supplier',
            'kuantitas' => $request->kuantitas,
            'tgl_butuh' => $request->tgl_butuh
        ]);

    }

   

}
