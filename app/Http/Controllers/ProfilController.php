<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
use App\User;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.profile');
    }

    public function edit(Request $req){
    	// dd($req);
    	$profile = User::find($req->id);
    	$profile->name = $req->name;
    	$profile->alamat = $req->alamat;
    	$profile->nohp = $req->nohp;
    	$profile->email = $req->email;
    	$profile->save();
    	
    	return redirect('/profile');
    }
}
