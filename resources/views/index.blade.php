@extends('layouts.template')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      @if(Auth::check())
        <h1>Hai {{Auth::user()->role}}</h1>
      @else
        <h1>Hai</h1>
      @endif 
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      @if(Auth::user()->role == 'admin')
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ count($orders) }}</h3>

                <p>Total Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('/order')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ count($pengajuan) }}</h3>

                <p>Total Pengajuan</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="{{ route('penawaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{ count($pelanggan) }}</h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ count($supplier) }}</h3>

                <p>Total Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('supplier.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

      @elseif(Auth::user()->role == 'supplier')
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>{{ count($penawaran) }}</h3>

                <p>Total Penawaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="{{ route('penawaran.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{ count($pengajuan) }}</h3>

                <p>Total Pengajuan</p>
              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a href="{{ route('pengajuan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      @else
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Product</h3>

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
                    <th>ID</th>
                    <th>Foto Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga/kilo</th>
                    <th>Action</th>
                  </tr>
                  @foreach($product as $p)
                  <tr>
                    <td>{{ $p->id }}</td>
                    <td><img class="img-fluid" src="{{ old('foto_produk') ? old('foto_produk') : $p->foto_produk }}" alt="Card Image Cap" style="max-height: 150px;" ></td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->harga}}</td>
                    <td><a href="{{route ('tambahOrder', $p->id) }}" class="btn btn-info" role = 'button'>Buy</td>
                  </tr>
                  @endforeach
                </table>
              </div>
      @endif
    </section>
    <!-- /.content -->
@endsection
