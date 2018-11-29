<?php

namespace App\Http\Controllers;

use Auth;
use App\Pelanggan;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('layouts.registrasi');
        // dd(Auth::user());
        $pelanggan = Pelanggan::where('id_user', Auth::user()->pelanggan()->first()->id)->first();
        return view('index', compact('pelanggan'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama' => 'required|String|max:255',
            'alamat' => 'required|string|max:255',
            'nohp' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // dd('masuk');
        $user=User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pembeli',
        ]);

        Pelanggan::create([
            'id_user'=> $user->id,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
        ]);

        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(pelanggan $pelanggan)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelanggan $pelanggan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelanggan $pelanggan)
    {
        //
    }

    // public function register(Request $r)
    // {
    //     $r->validate([
    //         'nama' => 'required|String|max:255',
    //         'alamat' => 'required|string|max:255',
    //         'nohp' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation'=>'required'
    //     ]);

    //     $user = User::create([
    //         'email'=>$r->email,
    //         'password'=>bcrypt($r->password),
    //     ]);

    //     $user->pelanggan()->create([
    //         'nama' => $request->nama,
    //         'alamat' => $request->alamat,
    //         'nohp' => $request->nohp,
    //     ]);

    //     return view('index');
    // }
}
