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
    	return view('admin.supplier.index');
    }

    public function create(){
    	return view('admin.supplier.add');
    }
}
