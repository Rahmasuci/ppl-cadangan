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
       <div class="col-md-12" style="padding: 50px;">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Membuat Penawaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route ('storePenawaran', $orderdetail->id)}}" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputText" class="col-sm-2 control-label">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input readonly="readonly" value="{{$orderdetail->order->pelanggan->nama}}" type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputText" class="col-sm-2 control-label">Alamat Pengiriman</label>
                  <div class="col-sm-10">
                    <input readonly="readonly" value="{{$orderdetail->order->alamat_pengiriman}}" type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNumber" class="col-sm-2 control-label">Tanggal Butuh</label>
                  <div class="col-sm-10">
                    <input readonly="readonly" value="{{$orderdetail->order->batas_pengiriman}}" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputText" class="col-sm-2 control-label">Kuantitas Order</label>
                  <div class="col-sm-10">
                    {{-- @foreach ($order->orderdetail) --}}
                    <input readonly="readonly"  value="{{$orderdetail->kuantitas}}" type="text" class="form-control" id="inputText">
                    {{-- @endforeach --}}
                  </div>
                </div>
                <div class="form-group {{$errors->has('qty_butuh') ? 'has_error' : ''}}">
                  <label for="inputNumber" class="col-sm-2 control-label">Kuantitas Kurang</label>
                  <div class="col-sm-10">
                    <input type="number" name='qty_butuh' class="form-control" id="inputNumber">
                    @if ($errors->has('qty_butuh'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('qty_butuh') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>
                <div class="form-group {{$errors->has('hrg_max') ? 'has_error' : ''}}">
                  <label for="inputNumber" class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="number" name="hrg_max" class="form-control" id="inputNumber">
                    @if ($errors->has('hrg_max'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('hrg_max') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{route('order.index')}}" class="btn btn-default">Cancel</a>
                {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>

@endsection