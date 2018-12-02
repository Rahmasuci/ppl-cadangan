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
                <tr>
                  {{-- {{ dd($data) --}}
                  <td >{{ $loop->iteration }}</td>
                  <td>{{ $d->supplier->nama_supplier}}</td>
                  <td>{{ $d->supplier->alamat_kebun}}</td>
                  <td>{{ $d->qty }}</td>
                  <td>{{ $d->hrg }}</td>
                  <td>{{$d->status}}</td>
                  <td>
                  @if(Auth::user()->role == 'supplier')
                    @if($d->status == 'diterima')
                      <td>
                        <a href="{{route('kirimPengajuan', $d->id)}}" class="btn btn-success">Dikirim</a>
                      </td>
                    @elseif ($d->status == 'sudah dibayar')
                      <button class="btn btn-info" data-toggle="modal" data-target="#myBukti-{{$d->id}}">Lihat Bukti </button>
                      <a href="{{route('verifPengajuan', $d->id)}}" class="btn btn-primary">Verifikasi</a>
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
