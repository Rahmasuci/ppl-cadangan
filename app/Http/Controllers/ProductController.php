<?php 
namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        return view('product.list', [
            'data'      => $produk,
            'tittle'    => 'List Produk',
            'active'    => 'product.list',
            'createLink'=> route('product.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.list', [
            'tittle'        => 'Tambah Produk',
            'modul_link'    => route('product.index'),
            'modul'         => 'Produk',
            'action'        => route('product.store'),
            'active'        => 'product.index'
        ]);
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
            'foto_produk' => 'required',
            'nama_produk' => 'required|String',
            'harga' => 'required|String',
        ]);

        // dd($request);

        $f_p = $request->file('foto_produk')->store('public');
        $f_p = str_replace('public', '', $f_p);
        $f_p = str_replace('\\', '/', $f_p);
        $f_p = asset('storage'.$f_p);

        // dd($f_p);

        Product::create([
            'foto_produk'   => $f_p,
            'nama_produk'   => $request->nama_produk,
            'harga'         => $request->harga
        ]);

        return redirect()->route('product.index');
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
    public function edit(Product $product)
    {
        return view('product.list', [
            'data'          => $product,
            'tittle'        => 'Edit Produk',
            'modul_link'    => route('product.index'),
            'modul'         => 'Produk',
            'action'        => route('product.store'),
            'active'        => 'product.index'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'foto_produk' => 'required',
            'nama_produk' => 'required|String',
            'harga' => 'required|String',
        ]);

        $f_p = $request->file('foto_produk')->store('public');
        $f_p = str_replace('public', '', $f_p);
        $f_p = str_replace('\\', '/', $f_p);
        $f_p = asset('storage'.$f_p);

        $product->update([
            'foto_produk' => $f_p,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('masuk');
        $product = Product::find($id);
        $product->delete($id);

        return redirect()->route('product.index');
    }
}
