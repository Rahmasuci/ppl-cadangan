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
      {{-- <a href="{{route ('penawaran.create')}}" class="btn btn-primary">Tambah Penawaran</a>  --}}
      <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pengajuan</h3>

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
                  <th>Kuantitas Kirim</th>
                  <th>Harga</th>
                  <th>Alamat Pengiriman</th>
                  <th>Supplier</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <tr>
                  @foreach ($data as $d)
                  {{-- {{ dd($data) }} --}}
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $d->supplier->nama_supplier}}</td>
                    @foreach ($d->orderdetail as $dt)
                  <td>{{ $dt->order->pelanggan->nama}}</td>
                    @endforeach
                  <{{-- td>{{ $d->orderdetail->product->nama_produk}}</td>
                  <td>{{ $d->orderdetail->kuantitas}}</td>
                  <td>{{ $d->qty_butuh}}</td>
                  <td>{{ $d->hrg_max}}</td>
                  <td>{{ $d->orderdetail->order->alamat_pengiriman}}</td>
                  <td>{{ $d->status}}</td> --}}
                  <td>
                    @if(Auth::user()->role == 'admin')
                     {{--  <button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$d->id}}">Edit </button> 
                      <a href="{{route('hapusPenawaran', $d->id)}}" class="btn btn-danger">Delete</a> --}}
                    @endif
                  </td>
                  @endforeach
                </tr>
              </table>
            </div>

          {{--   <div class="modal fade" id="myModal-{{$d->id}}" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Produk</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{route('penawaran.update', $d->id)}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      @method('put')
                      <div class="box-body">
                        <div class="form-group">
                        <label>Kuantitas Order</label>
                        <div>
                          <input type="text" class="form-control" value="{{$d->orderdetail->kuantitas}}" readonly="readonly"> 
                        </div>
                      </div>
                        <div class="form-group">
                          <label>Kuantitas Butuh</label>
                          <div>
                            <input type="text" class="form-control" name="qty_butuh" id="inputText" value="{{$d->qty_butuh}}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Harga Max</label>
                          <div>
                            <input type="text" class="form-control" name="hrg_max" id="inputText" value="{{ $d->hrg_max }}">
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
            </div> --}}
    </section>

@endsection
