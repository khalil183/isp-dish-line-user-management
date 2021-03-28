@include('layouts.header')
<div class="login-box">
    <div class="login-box-body">
      <p class="login-box-msg">Login Form</p>
      <form action="{{ route('login') }}" method="post">
          @csrf
        <div class="form-group has-feedback">
          <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </form>
    </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->
@include('layouts.footer')
