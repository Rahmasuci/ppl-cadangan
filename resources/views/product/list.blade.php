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
  <button class="btn btn-primary" data-toggle="modal" data-target="#ModalTambah">Tambah Produk </button> 
  <div class="row" style="margin-top: 20px;">
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
            @foreach($data as $p)
            <tr>
              <td>{{ $p->id }}</td>
              <td>{{ $p->foto_produk }}</td>
              <td>{{ $p->nama_produk }}</td>
              <td>{{ $p->harga }}</td>
              <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal-{{$p->id}}">Edit </button> </td>
              <td><a href="{{route('product.destroy', $p->id)}}" class="btn btn-danger">Delete</a> </td>
              <!-- <td><a href="product/" class="btn btn-danger">Delete</a> </td> -->
            </tr>
            @endforeach
          </table>
        </div>

        <div class="modal fade" id="ModalTambah" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Produk</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <input type="hidden" name="id">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Foto Produk</label>
                      <div>
                        <input type="file" class="form-control" name="foto_produk" id="inputText" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <div>
                        <input type="text" class="form-control" name="nama_produk" id="inputText">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Harga/kilo</label>
                      <div>
                        <input type="text" class="form-control" name="harga" id="inputText">
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

        @foreach($data as $p)
          <div class="modal fade" id="myModal-{{$p->id}}" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Produk</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" method="POST" action="{{route('product.update', $p->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('put')
                    <div class="box-body">
                      <div class="form-group">
                      <label>Foto Produk</label>
                      <div>
                        <input type="file" class="form-control" name="foto_produk" id="inputText" required>
                      </div>
                    </div>
                      <div class="form-group">
                        <label>Nama Produk</label>
                        <div>
                          <input type="text" class="form-control" name="nama_produk" id="inputText" value="{{$p->nama_produk}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Harga/kilo</label>
                        <div>
                          <input type="text" class="form-control" name="harga" id="inputText" value="{{ $p->harga }}">
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
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection