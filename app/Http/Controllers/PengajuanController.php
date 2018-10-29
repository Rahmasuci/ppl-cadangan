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
        $data = Pengajuan::with('penawaran', 'supplier')->get();
        dd($data);
        return view('pengajuan.list', [
            'data'      => $data,
            'tittle'    => 'List Pengajuan',
            'active'    => 'pengajuan.list',
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
            'status'        => 'belum diverifikasi',
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
}
