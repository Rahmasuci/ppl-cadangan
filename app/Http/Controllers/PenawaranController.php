<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penawaran;

class PenawaranController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('penawaran.index');
    }

     public function create(){
    	return view('penawaran.make');
    }

}
