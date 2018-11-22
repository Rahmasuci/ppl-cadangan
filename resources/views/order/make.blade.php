@extends('layouts.template')

@section('content')
   <section class="content-header">
      @if(Auth::check())
        <h1>Hai {{Auth::user()->role}}</h1>
      @else
        <h1>Hai</h1>
      @endif 
    </section> 
    
    <div class="col-md-12" style="padding: 50px;">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Make Order</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="{{route ('storeOrder', $produk->id) }}" >

              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto Produk</label>
                  <div class="col-sm-10">
                    <img class="img-fluid" src="{{ old('foto_produk') ? old('foto_produk') : $produk->foto_produk }}" alt="Card Image Cap" style="max-height: 160px;" >
                    <!-- <input value="{{$produk->foto_produk}}" type="text" class="form-control" id="inputText"> -->
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input readonly="readonly" value="{{$produk->nama_produk}}" type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Harga Produk</label>
                  <div class="col-sm-10">
                    <input readonly="readonly" value="{{$produk->harga}}" type="text" class="form-control" id="hargaProduk">
                  </div>
                </div>
                <div class="form-group {{$errors->has('kuantitas') ? 'has_error' : ''}}">
                  <label for="inputNumber" class="col-sm-2 control-label">Kuantitas (kg)</label>
                  <div class="col-sm-10">
                    <input name='kuantitas' type="number" class="form-control" onkeyup="hitungTotal()" id="qty" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNumber" class="col-sm-2 control-label" >Harga Total</label>
                  <div class="col-sm-10">
                    <input name = 'total' readonly="readonly" type="number" class="form-control" id="total" placeholder="{{$produk->harga}}">
                  </div>
                </div>
                <hr>
                <div class="form-group{{$errors->has('alamat_pengiriman') ? 'has_error' : ''}}">
                  <label for="inputNumber" class="col-sm-2 control-label" >{{__('Alamat Pengiriman')}}:</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat_pengiriman" value="{{ old('alamat_pengiriman') }}" class="form-control" id="total" placeholder="Alamat Pengiriman" required>
                    @if($errors->has('alamat_pengiriman'))
                      <span class="help-block">{{ $errors->has('alamat_pengiriman') }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <input type="hidden" name="_method" value="get"> -->
                <!-- <button type="button" class="btn btn-default">Cancel</button> -->
                <button type="submit" class="btn btn-info pull-right">Save</button>

              </div>
              <!-- /.box-footer -->

            </form>
          </div>
        </div>


@endsection

@push('script')

<script type="text/javascript">
  function hitungTotal() {
    var qty = Number($('#qty').val());
    var hargaProduk = Number($('#hargaProduk').val());
    var total = qty * hargaProduk;
    $("#total").val(total);
  }
</script>

@endpush