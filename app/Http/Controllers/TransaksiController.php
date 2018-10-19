<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('transaksi.list');
    }

     public function create(){
    	return view('transaksi.upload');
    }



}
