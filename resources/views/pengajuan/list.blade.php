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
        @include('succes_msg');
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Penawaran</h3>
            </div>
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama Pelanggan</th>
                  <th>Alamat Pengiriman</th>
                  <th> @if(Auth::user()->role == 'admin')
                  Kuantitas Order
                  @endif
                  </th>
                  <th>Kuantitas Kurang</th>
                  <th>Harga Max</th>
                </tr>                 

                @foreach ($penawaran as $p)
                <tr>
                  <td>{{$p->orderdetail->order->pelanggan->nama}}</td>
                  <td>{{$p->orderdetail->order->alamat_pengiriman}}</td>
                  <td> @if(Auth::user()->role == 'admin')
                    {{$p->orderdetail->kuantitas}}  
                    @endif
                  </td>
                  <td id="qty_butuh">{{$p->qty_butuh}}</td>
                  <td>{{$p->hrg_max}}</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    
     <div class="row" style="margin-top: 20px;">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pengajuan</h3>
            </div>
            
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th/>
                  <th>Nama Supplier</th>
                  <th>Alamat Kebun</th>
                  <th>Kuantitas Yang Diajukan</th>
                  <th>Harga Yang Diajukan </th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>                 

                @foreach ($data as $d )
                 {{--  @foreach($d->penawaran as $dt) --}}
                <tr>
                  {{-- {{ dd($data) }} --}}
                  <td >{{ $loop->iteration }}</td>
                  <td>{{ $d->supplier->nama_supplier}}</td>
                  <td>{{ $d->supplier->alamat_kebun}}</td>
                  <td id="qty">{{ $d->qty }}</td>
                  <td>{{ $d->hrg }}</td>
                  <td>{{$d->status}}</td>
                  <td>
                  @if(Auth::user()->role == 'admin')
                    @if($d->status == 'belum diterima')
                      <td><a href="/distribusi/public/terima/{{$d->id}}/{{$d->penawaran->id}}" class="btn btn-success" id="terima" onclick="myFunction()" >Diterima</a></td>
                    @elseif($d->status == 'diterima')
                      <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$d->id}}">Upload </button>
                      </td>
                       <div class="modal fade" id="myModal-{{$d->id}}" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" method="POST" action="{{route('unggahPengajuan', $d->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @method('put')
                                <div class="box-body">
                                  <div class="form-group">
                                  <label>Bukti Pembayaran</label>
                                  <div>
                                    <input type="file" class="form-control" name="file_pembayaran" id="inputText"> 
                                  </div>
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
                    @else
                      <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button>
                      </td>
                    @endif
                  @else
                    @if($d->status == 'diterima')
                      <td>
                       {{--  <a href="{{route('prosesPengajuan', $d->id)}}" class="btn btn-success">Diproses</a>
                      </td>
                    @elseif ($d->status == 'dalam proses')
                      <td> --}}
                        <a href="{{route('kirimPengajuan', $d->id)}}" class="btn btn-success">Dikirim</a>
                      </td>
                    @elseif ($d->status == 'sudah dibayar')
                      <button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button>
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
                          <img class="img-fluid" src="{{ old('file_pembayaran') ? old('file_pembayaran') : $d->file_pembayaran }}" alt="Card Image Cap" style="max-height: 150px;"</td>
                        </div>
                        </div>
                      </div>
                    </div>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

@push('script')
  <script>
    function myFunction() {
      if (($('#qty')) > ($('#qty_butuh'))) {
        alert("I am an alert box!");
      }
    }
    </script>
@endpush