@extends('Layout.Main._partial')
@section('main_title')Role Permission @endsection
@section('main_content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Assigning Permissions to: {{$role->name}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content w-full">

    <!-- Default box -->
      <div class="row">
        <div class="col-12 col-md-12">
          @session('status')
              <div class="alert alert-success">
                  {{ $value }}
              </div>
          @endsession

          <div class="card">
            <div class="card-header">
              <h4>Assigning Permissions to Role <a href="{{route('roles.index')}}" class="btn btn-primary float-end float-right">Back</a></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form method="post" action="{{route('role.assign.permission',$role->id)}}">
                @csrf
                @foreach ($permissions as $permission)
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
                <div class="row mt-1">
                <div class="col-md-1">
                  <input type="checkbox"
                  name="permissions[]"
                  value="{{$permission->name}}"
                  {{in_array($permission->id,$rolePermissions) ? 'checked':''}}
                  class="form-control"

                  />
                </div>
                <div class="col-md-3">
                  <label class="text text-primary">{{$permission->name}}</label>
                </div>
              </div>


                @endforeach
                <div class="mb-2 mt-2">
                  <input type="submit" value="Update" class="btn btn-primary"/>
                </div>

              </form>

            </div>
            <!-- /.card-body -->
          </div>
        </div>



      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>


@endsection
