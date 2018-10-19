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
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNumber" class="col-sm-2 control-label">Kuantitas</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputNumber">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNumber" class="col-sm-2 control-label">Harga Total</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputNumber">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

    </section>

@endsection