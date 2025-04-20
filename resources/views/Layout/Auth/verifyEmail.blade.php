
@extends('Layout.Auth._partials._authlayout')
@section('authtitle')Verify Email @endsection
@section('authbody')
<div class="login-box" style="width: 500px;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <b>Admin</b>LTE
    </div>
    <div class="card-body">
      <h6 class="text-center"><strong>Veify Your Registered Email</strong></h6><hr>
        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
          </div>
    @endif


        <div class="row">
          <div class="col-6">
            <form  method="post" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-block">Resend Verification</button>
            </form>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <a href="{{ route('profile.user',Auth::user()->id )}}" class="btn btn-outline-success btn-block">Edit Profile</a>
          </div>
          <div class="col-2">
            <form  method="post" action="{{ route('logout') }}">
                @csrf
            <input type="submit" class="btn btn-outline-danger" value="Logout"/>
            </form>
          </div>
          <!-- /.col -->
        </div>


      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="{{route('auth.google.redirect')}}" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{route('user.register')}}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection
