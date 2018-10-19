@extends('layouts.template')

@section('content')

	<section class="content-header">
      <h1>
        Admin
        <small>Optional description</small>
      </h1>
    </section>

    <div class="col-md-12" style="padding: 20px;">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" style="position: relative;">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Supplier</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Alamat Rumah</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                 <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Kebun</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                 <div class="form-group">
                  <label  class="col-sm-2 control-label">Alamat Kebun</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">No Hp</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email">
                  </div>
                </div><div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input id="password" type="password" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Role</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" placeholder="Supplier">
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
@endsection
