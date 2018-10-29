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
         return redirect('/profile');
        // dd($req);
    	// if(Auth::user()->role == 'pembeli'){
     //        $profile = Pelanggan::find($req->id);
     //        $profile->nama = $req->nama;
     //        $profile->alamat = $req->alamat;
     //        $profile->nohp = $req->nohp;
     //        $profile->save();
     //    }
            

     //    else(Auth::user()->role == 'supplier'){
     //        $profile = Supplier::find($req->id);
     //         $profile->nama_supplier => $req->nama_supplier;
     //         $profile->alamat => $req->alamat;
     //         $profile->no_hp=> $req->->no_hp;
     //         $profile->nama_kebun => $req->nama_kebun;
     //         $profile->alamat_kebun => $req->alamat_kebun;
     //          $profile->save();
     //    }

     //    //  $request->validate([
     //    //     'nama_supplier' => 'required|String|max:255',
     //    //     'alamat' => 'required|string|max:255',
     //    //     'no_hp' => 'required|string|max:255',
     //    //     'nama_kebun' => 'required|String|max:255',
     //    //     'alamat_kebun' => 'required|String|max:255',
     //    // ]);

                	
    	
    }
}
