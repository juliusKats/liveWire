@extends('Layout.Auth._partials._authlayout')
@section('authtitle')Forgot-Password @endsection
@section('authbody')

<div class="login-box" style="width:450px">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{route('index')}}" class="h1"><b>Forgot Password</a>
    </div>
    <div class="card-body">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('status') }}</strong>
          </div>
        @endif
      <form method="post" action="{{route('password.resend.link')}}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
