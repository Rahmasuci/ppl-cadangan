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
      <div class="row" style="margin-top: 20px;">
         @include('succes_msg')
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
                    @if($d->status == 'sudah bayar')
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button></td>
                      <td><a href="{{route ('verifOrder', $d->id)}} " class="btn btn-primary">Verifikasi</a></td>
                    @elseif($d->status == 'terverifikasi')
                      {{-- <td><button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button></td> --}}
                      <td><a href="{{route ('makePenawaran', $dt->id)}} " class="btn btn-warning">Buat Penawaran</a></td>
                      <td><a href="{{route ('prosesOrder', $d->id)}}" class="btn btn-success">Dikirim</a></td>
                    @elseif($d->status == 'selesai')
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button></td>
                    @elseif($d->status == 'batal')

                    @endif
                    
                  @else (Auth::user()->role == 'pembeli')
                    @if($d->status == 'belum dibayar')
                      <td><a href="{{route ('batalOrder', $d->id)}} " class="btn btn-danger">Batal</a></td>
                      <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$d->id}}">Upload </button></td>
                        <div class="modal fade" id="myModal-{{$d->id}}" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" method="POST" action="{{route('uploadOrder', $d->id)}}" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                  @method('put')
                                  <div class="box-body">
                                    <div class="form-group">
                                    <label>Bukti Pembayaran</label>
                                    <div>
                                      <input type="file" class="form-control" name="bukti_pembayaran" id="inputText"> 
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-info">Save</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      @elseif ($d->status == 'sudah bayar')
                       <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button>
                       </td>
                      @elseif ($d->status == 'dikirim')
                        <td>
                         <a href="{{route('selesaiOrder', $d->id)}}" class="btn btn-success">Selesai</a>
                       </td>
                      @elseif($d->status == 'batal')
                      @else 
                       <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button>
                       </td>
                    @endif
                  @endif
                    <div class="modal fade" id="myBukti-{{$d->id}}" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Bukti Pembayaran</h4>
                          </div>
                          <div class="modal-body">
                            <img class="img-fluid" src="{{ old('bukti_pembayaran') ? old('bukti_pembayaran') : $d->bukti_pembayaran }}" alt="Card Image Cap" style="max-height: 150px;"</td>
                          </div>
                          </div>
                        </div>
                      </div>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
</section>
   
@endsection