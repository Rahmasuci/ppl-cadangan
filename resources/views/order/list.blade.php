@extends('layouts.template')

@section('content')
 
   <section class="content-header">
      @if(Auth::check())
        <h1>Hai {{Auth::user()->role}}</h1>
      @else
        <h1>Hai</h1>
      @endif 
    </section> 

    <section class="content container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Order</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  {{-- <th>ID</th> --}}
                  <th>Nama Pelanggan</th>
                  <th>Nama Produk</th>
                  <th>Kuantitas</th>
                  <th>Harga Total</th>
                  <th>Alamat Pengiriman</th>
                  <th>Tanggal Pesan</th>
                  <th>Batas Pengiriman</th>
                  <th>Tanggal Kirim</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                 @foreach ($data as $d)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  {{-- <td>{{ $d->id }}</td> --}}
                  <td>{{ $d->pelanggan->nama}}</td>
                   @foreach ($d->orderdetail as $dt)
                  <td>{{ $dt->product->nama_produk}}</td>
                  <td>{{ $dt->kuantitas }}</td>
                  <td>{{ $dt->total }}</td>
                  @endforeach
                  <td>{{ $d->alamat_pengiriman}}</td>
                  <td>{{ $d->created_at }}</td>
                  <td>{{ $d->batas_pengiriman }}</td>
                  <td>{{ $d->tgl_kirim }}</td>
                  <td>{{ $d->tgl_selesai }}</td>
                  <td>{{ $d->status }}</td>
                  @if(Auth::user()->role == 'admin')
                    @if($d->status == 'belum diverifikasi')
                      <td><a href="{{route ('verifOrder', $d->id)}} " class="btn btn-primary">Verifikasi</a></td>
                    @else
                      <td><a href="{{route ('makePenawaran', $dt->id)}} " class="btn btn-warning">Buat Penawaran</a></td>
                    @endif
                  @endif
                </tr>
                @endforeach
              </table>
            </div>
           
          </div>
          
        </div>
      </div>
</section>
   
@endsection