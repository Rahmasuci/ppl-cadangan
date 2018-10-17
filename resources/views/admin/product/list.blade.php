@extends('layouts.template')

@section('content')
 
    <section class="content-header">
      <h1>
        Admin
        <small>Optional description</small>
      </h1>
    </section>

    
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
                  <td>      <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Edit </button> </td>
                </tr>
                @endforeach
              </table>
            </div>

           <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Produk</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="post" action="{{url('/product/edit')}}">
                    <input type="hidden" name="id" value="{{$p->id}}">
                    {{csrf_field()}}
                    <div class="box-body">
                      <div class="form-group">
                        <label>Nama Produk</label>
                          <div>
                           <input type="text" class="form-control" name="nama_produk" id="inputText" value="{{$p->nama_produk}}">
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Harga/kilo</label>
                          <div>
                           <input type="text" class="form-control" name="harga_perkilo" id="inputText" value="{{ $p->harga_perkilo }}">
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                  </form>
                </div>
              </div>
            </div>


            
    
</section>
   
@endsection