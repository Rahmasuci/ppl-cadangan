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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->route('product.index')->with('success_msg','Produk berhasil ditambahkan');
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
    public function edit()
    {
        //
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
        // dd($id);
        $product = Product::find($id);

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

        $product->update([
            'foto_produk' => $f_p,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
        ]);

        return redirect()->route('product.index')->with('success_msg','Produk berhasil di ubah');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // // dd('masuk');
        // $product = Product::find($id);
        // $product->delete($id);

        // return redirect()->route('product.index');
    }
}
