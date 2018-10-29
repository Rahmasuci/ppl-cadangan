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
      <a href="{{route ('supplier.create')}}" class="btn btn-primary">Tambah Supplier</a> 
      <div class="row" style="margin-top: 20px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Supplier</h3>

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
                  <th>Nama Supplier</th>
                  <th>Alamat Rumah</th>
                  <th>No Hp</th>
                  <th>Nama Kebun</th>
                  <th>Alamat Kebun</th>
                </tr>
                @foreach($supplier as $s)
                <tr>
                  <td>{{ $s->id }}</td>
                  <td>{{ $s->nama_supplier }}</td>
                  <td>{{ $s->alamat }}</td>
                  <td>{{ $s->no_hp }}</td>
                  <td>{{ $s->nama_kebun }}</td>
                  <td>{{ $s->alamat_kebun }}</td>
                </tr>
                @endforeach
              </table>
            </div>
           
          </div>
          
        </div>
      </div>
</section>

    </section>
    <!-- /.content -->
@endsection
