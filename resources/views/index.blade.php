@extends('layouts.template')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nanti isinya Role
        <small>Optional description</small>
      </h1>
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
                  <th>Nama Produk</th>
                  <th>Harga/kilo</th>
                  <th>Action</th>
                </tr>
                @foreach($product as $p)
                <tr>
                  <td>{{ $p->id }}</td>
                  <td>{{ $p->nama_produk }}</td>
                  <td>{{ $p->harga_perkilo }}</td>
                  <td><a href="{{ url ('/order/make/'.$p->id) }}" class="btn btn-info" role = 'button'>Buy</td>
                </tr>
                @endforeach
              </table>
            </div>

    </section>
    <!-- /.content -->
@endsection
