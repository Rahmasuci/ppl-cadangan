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

    </section>
    <!-- /.content -->
@endsection
