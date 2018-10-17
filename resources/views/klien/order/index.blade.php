@extends('layouts.template')

@section('content')
 
    <section class="content-header">
      <h1>
        Customer
        <small>Optional description</small>
      </h1>
    </section>

    <section class="content container-fluid">
      <div class="row">
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
                  <th>ID</th>
                  <th>Nama Produk</th>
                  <th>Kuantitas</th>
                  <th>Harga Total</th>
                  <th>Tanggal Pesan</th>
                  <th>Batas Pengriman</th>
                  <th>Tanggal Kirim</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </table>
            </div>
           
          </div>
          
        </div>
      </div>
</section>
   
@endsection