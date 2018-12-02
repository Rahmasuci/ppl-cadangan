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
        @include('succes_msg')
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Penawaran</h3>

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
                  <th> @if(Auth::user()->role == 'admin')
                      Kuantitas Order
                      @endif
                  </th>
                  <th>Kuantitas Butuh</th>
                  <th>Harga Max</th>
                  <th>Alamat Pnengiriman</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                 @foreach ($data as $d)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $d->orderdetail->order->pelanggan->nama}}</td>
                  <td>{{ $d->orderdetail->product->nama_produk}}</td>
                  <td>@if(Auth::user()->role == 'admin')
                    {{ $d->orderdetail->kuantitas}}
                    @endif
                  </td>
                  <td>{{ $d->qty_butuh}}</td>
                  <td>{{ $d->hrg_max}}</td>
                  <td>{{ $d->orderdetail->order->alamat_pengiriman}}</td>
                  <td>{{ $d->status}}</td>
                  <td>
                    @if(Auth::user()->role == 'admin')
                      @if($d->status == 'cari supplier')
                      <a href="{{route('cancelPenawaran', $d->id)}}" class="btn btn-danger">Batal</a>
                       <a href="{{route('pengajuan.show', $d->id)}}" class="btn btn-primary">Lihat Pengajuan</a>
                       <a href="{{route('selesaiPenawaran', $d->id)}}" class="btn btn-success">Selesai</a>
                       @endif

                    @elseif(Auth::user()->role == 'supplier')
                      @if($d->status == 'cari supplier')
                      <button class="btn btn-warning" data-toggle="modal" data-target="#ajukanModal-{{$d->id}}">Mengajukan </button>
                      <div class="modal fade" id="ajukanModal-{{$d->id}}" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Buat Pengajuan</h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" method="POST" action="{{route('storePengajuan', $d->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{-- @method('put') --}}
                                <div class="box-body">
                                 <div class="form-group">
                                    <label>Kuantitas Butuh</label>
                                    <div>
                                      <input type="text" class="form-control" id="inputText" value="{{$d->qty_butuh}}" readonly="readonly">
                                    </div>
                                  </div>
                                  <div class="form-group {{-- {{$errors->has('qty') ? 'has_error' : ''}} --}}">
                                    <label>Kuantitas Yang Diajukan</label>
                                    <div>
                                      <input type="text" class="form-control" name="qty" id="inputText">
                                     {{--  @if ($errors->has('qty'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('qty') }}</strong>
                                        </span>
                                      @endif --}}
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Harga Max</label>
                                    <div>
                                      <input type="text" class="form-control" id="inputText" value="{{ $d->hrg_max }}" readonly="readonly">
                                    </div>
                                  </div>
                                  <div class="form-group {{-- {{$errors->has('hrg') ? 'has_error' : ''}} --}}">
                                    <label>Harga Yang Diajukan</label>
                                    <div>
                                      <input type="text" class="form-control" name="hrg" id="inputText">
                                      {{-- @if ($errors->has('hrg'))
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $errors->first('hrg') }}</strong>
                                        </span>
                                      @endif --}}
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
                      @endif

                      {{-- <a href="{{route('pengajuan.show', $d->id)}}" class="btn btn-primary">Lihat Pengajuan</a> --}}
                    @endif
                  </td>
                  @endforeach
                </tr>
              </table>
            </div>

           
            

    </section>

@endsection
