@extends('store.template')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2"><br>
      <div class="panel panel-success">
        <div class="panel-heading">Login</div>
        <div class="panel-body">

         @include('store.parcial.errors')

          <form class="form-horizontal" role="form" method="POST" action="{{ route('login-get') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
              <label class="col-md-4 control-label">Email</label>
              <div class="col-md-6">
                 <input class="form-control" type="email" name="email" value="{{ old('email') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                  <input class="form-control" type="password" name="password" id="password">
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Remember Me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-success" style="margin-right: 15px;">
                  Login
                </button>

                <a href="/password/email">Olvidaste tu contraseña?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection