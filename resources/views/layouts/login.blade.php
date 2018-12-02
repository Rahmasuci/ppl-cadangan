@include('form.head')

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
      @csrf

      <div class="form-group has-feedback">
         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
         @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <div class="form-group row">
        {{-- <div class="col-md-6 offset-md-4">
             <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
             </div>
        </div>  --}}    
        <!-- /.col -->
        <div class="col-xs-6" style="margin-left: 90px; ">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <a href="#">I forgot my password</a><br> --}}
    <a href="{{ route('make.klien') }}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('form.bawah')
</body>