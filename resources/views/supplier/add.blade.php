@extends('layouts.template')

@section('content')

	<section class="content-header">
      <h1>
        @if(Auth::check())
          <h1>Hai {{Auth::user()->role}}</h1>
          @else
          <h1>Hai</h1>
        @endif 
    </section>

    <div class="col-md-12" style="padding: 20px;">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Supplier</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route ('supplier.store')}}" method="post">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Supplier</label>
                  <div class="col-sm-10">
                    <input id="nama_supplier" type="text" class="form-control{{ $errors->has('nama_supplier') ? ' is-invalid' : '' }}" name="nama_supplier" value="{{ old('nama_supplier') }}" required autofocus>
                    @if ($errors->has('nama_supplier'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama_supplier') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Alamat Rumah</label>
                  <div class="col-sm-10">
                    <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>
                    @if ($errors->has('alamat'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamat') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                 <div class="form-group">
                  <label  class="col-sm-2 control-label">Nama Kebun</label>
                  <div class="col-sm-10">
                    <input id="nama_kebun" type="text"  class="form-control{{ $errors->has('nama_kebun') ? ' is-invalid' : '' }}" name="nama_kebun" value="{{ old('nama_kebun') }}" required autofocus>
                    @if ($errors->has('nama_kebun'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nama_kebun') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                 <div class="form-group">
                  <label  class="col-sm-2 control-label">Alamat Kebun</label>
                  <div class="col-sm-10">
                    <input id="alamat_kebun" type="text" class="form-control{{ $errors->has('alamat_kebun') ? ' is-invalid' : '' }}" name="alamat_kebun" value="{{ old('alamat_kebun') }}" required autofocus>
                    @if ($errors->has('alamat_kebun'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('alamat_kebun') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">No Hp</label>
                  <div class="col-sm-10">
                    <input id="no_hp" type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('no_hp') }}" required autofocus>
                    @if ($errors->has('no_hp'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('no_hp') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                 <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label  class="col-sm-2 control-label">Role</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" placeholder="Supplier">
                  </div>
                </div> -->
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
