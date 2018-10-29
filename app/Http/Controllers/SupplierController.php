<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Supplier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $supplier = Supplier::all();
         $arr['supplier'] = Supplier::all();
        return view('supplier.list')->with($arr);
        //     , [
        //     'data'      => $supplier,
        //     'tittle'    => 'List Supplier',
        //     'active'    => 'supplier.list',
        //     'createLink'=> route('supplier.create')
        // ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('masuk');
        $request->validate([
            'nama_supplier' => 'required|String|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'nama_kebun' => 'required|String|max:255',
            'alamat_kebun' => 'required|String|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // dd('masuk');
        $user=User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'supplier',
        ]);

        Supplier::create([
            'id_user'=> $user->id,
            'nama_supplier' => $request->nama_supplier,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nama_kebun' => $request->nama_kebun,
            'alamat_kebun' => $request->alamat_kebun,
            
        ]);

        return redirect()->route('supplier.index');
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
        // $supplier = Supplier::find($id);

        //  $request->validate([
        //     'nama_supplier' => 'required|String|max:255',
        //     'alamat' => 'required|string|max:255',
        //     'no_hp' => 'required|string|max:255',
        //     'nama_kebun' => 'required|String|max:255',
        //     'alamat_kebun' => 'required|String|max:255',
        // ]);

        //  $supplier->update([
        //     'nama_supplier' => $nama_supplier,
        //     'alamat' => $request->alamat,
        //     'no_hp' => $request->no_hp,
        //     'nama_kebun' => $request->nama_kebun,
        //     'alamat_kebun' => $request->alamat_kebun,
        // ]);

        // return redirect('supplier.index');

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
