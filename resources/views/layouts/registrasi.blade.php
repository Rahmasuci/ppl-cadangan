@include('form.head')
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Registrasi</b> </a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{ route ('klien.store') }}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input id="nama" type="text"  class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus placeholder="Name">
          @if ($errors->has('nama'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('nama') }}</strong>
          </span>
          @endif
          <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="alamat" type="text"class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus placeholder="Alamat">
          @if ($errors->has('alamat'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('alamat') }}</strong>
              </span>
          @endif
          <span class="fa fa-home form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input  id="nohp" type="text" class="form-control{{ $errors->has('nohp') ? ' is-invalid' : '' }}" name="nohp" value="{{ old('nohp') }}" required autofocus placeholder="No Hp">
          @if ($errors->has('nohp'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nohp') }}</strong>
              </span>
          @endif
          <span class="fa fa-mobile form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
           @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required placeholder="Retype password">
          <span class="fa fa-sign-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
           <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
         </div>
         <!-- /.col -->
         <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

@include('form.bawah')
</body>
</html>
