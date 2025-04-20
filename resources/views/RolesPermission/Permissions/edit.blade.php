
@extends('Layout.Main._partial')
@section('main_title') Edit Permission @endsection
@section('main_content')
<div class="content-wrapper">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <div class="card-body">
      <p class="login-box-msg">Editing {{$perm->name}} Permission</p>
      @if($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
<ul>
  @foreach($errors->all() as $error)
      <li>{{$error}}</li>
  @endforeach
</ul>
</div>
@endif
      <form  action="{{ route('permission.update',$perm->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Edit Permission" name="perms" value="{{$perm->name}}" required autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection
