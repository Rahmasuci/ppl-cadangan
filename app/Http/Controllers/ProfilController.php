<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use App\User;
use App\Pelanggan;
use App\Supplier;

class ProfilController extends Controller
{
    public function index()
    {
        return view('pages.profile');
    }

    public function edit(Request $req){
       
        // $req->user()->update($data);
    	   if($req->user()->role == 'pembeli'){
                $req->user()->pelanggan()->update([
                'nama'   => $req->nama,
                'alamat' => $req->alamat,
                'nohp'   => $req->nohp,
                ]);

            }else{
                $req->user()->supplier()->update([
                    'nama_supplier' => $req->nama_supplier,
                    'alamat'        => $req->alamat,
                    'no_hp'         => $req->no_hp,
                    'nama_kebun'    => $req->nama_kebun,
                    'alamat_kebun'  => $req->alamat_kebun,
                ]);
            }
         return redirect('/profile')->with('success_msg','Profil berhasil diubah');;
       
    }
}
