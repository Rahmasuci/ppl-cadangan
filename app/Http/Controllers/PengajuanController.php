<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penawaran;
use App\Pengajuan;
use App\Supplier;
use Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [];
       
        $data = Pengajuan::with('penawaran', 'supplier')->where('id_supplier', Auth::user()->supplier()->first()->id)->get();
        //     $data = Pengajuan::with('penawaran', 'supplier')->get();
        // dd($data);
       
        
        // // dd($data, Pengajuan::where($id));
        return view('pengajuan.supplier', [
            'data'      => $data,
            'tittle'    => 'List Pengajuan',
            'active'    => 'pengajuan.supplier',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pengajuan.make');
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
        $penawaran = Penawaran::find($id);

        $request->validate([
            'penawaran' => $penawaran,
            'qty'       => 'required',
            'hrg'       => 'required'
        ]);

        // dd($id);
        $pengajuan = Pengajuan::create([
            'qty'           => $request->qty,
            'hrg'           => $request->hrg,
            'status'        => 'belum diterima',
            'id_penawaran'  => $penawaran->id,
            'id_supplier'   => Auth::user()->supplier->id,
        ]);

        return redirect()->route('pengajuan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $penawaran = Penawaran::find($id);
        $penawaran = Penawaran::with('orderdetail')->where('id', $id)->get();
        // $data = [];
        // dd($penawaran);
        if(Auth::user()->role == 'admin'){
            $data = Pengajuan::where('id_penawaran', $id)->get();
            // with('penawaran', 'supplier')->
        }
        else{

           $data = Pengajuan::where('id_supplier', Auth::user()->supplier()->first()->id)->get();
        }
        // dd($data);
       
        return view('pengajuan.list', [
            'data'      => $data,
            'penawaran' => $penawaran,
            'tittle'    => 'List Pengajuan',
            'active'    => 'pengajuan.list',
        ]);
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

    public function terima(Request $request, $id, $idp){

        // dd('masuk');
        $pengajuan = Pengajuan::find($id);
        $penawaran = Penawaran::find($idp);
        
        if ( $penawaran->qty_butuh >= $pengajuan->qty ) {
            
            $pengajuan = Pengajuan::find($id);

            $pengajuan->update([
                'status'=>'diterima',
            ]);

            $penawaran = Penawaran::find($idp);

            $penawaran->update([
                'qty_butuh'=> $penawaran->qty_butuh - $pengajuan->qty
            ]);

        } else {
            return redirect()->back()->with('success_msg','Kuantitas yang diajukan melebihi Kuantitas yang dibutuhkan');
        }

       return redirect()->back()->with('success_msg','Pengajuan berhasil di ubah');  
    }

    public function proses(Request $request, $id){

        $pengajuan = Pengajuan::find($id);

        $pengajuan->update([
            'status'=>'dalam proses',
        ]);

       return redirect()->back()->with('success_msg','Pengajuan berhasil di ubah');  
    }

     public function kirim(Request $request, $id){

        $pengajuan = Pengajuan::find($id);

        $pengajuan->update([
            'status'=>'di kirim',
        ]);

       return redirect()->back()->with('success_msg','Pengajuan berhasil di ubah');  
    }

    public function unggah(Request $request, $id){

        $pengajuan = Pengajuan::find($id);

        // dd($id);
        // dd($request);
        $request->validate([
            'file_pembayaran' => 'required',
        ]);

        $fp = $request->file('file_pembayaran')->store('public');
        $fp = str_replace('public', '', $fp);
        $fp = str_replace('\\', '/', $fp);
        $fp = asset('storage'.$fp);

        $pengajuan->update([
            'file_pembayaran'=> $fp,
            'status' => 'sudah dibayar'
            // 'batas_pengiriman' => 

        ]);

       return redirect()->back()->with('success_msg','Bukti pembayaran sudah di upload');  
    }

    public function verif(Request $request, $id){

        $pengajuan = Pengajuan::find($id);

        $pengajuan->update([
            'status'=>'terverifikasi',
        ]);

       return redirect()->back()->with('success_msg','Pengajuan terverifikasi');  
    }
}
