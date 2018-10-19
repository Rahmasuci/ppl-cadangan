<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(){
    	return view('supplier.list');
    }

    public function create(){
    	return view('supplier.add');
    }
}
