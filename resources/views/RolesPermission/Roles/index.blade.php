@extends('Layout.Main._partial')
@section('main_title')
    roles
@endsection
@section('main_content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content w-full">

            <!-- Default box -->
            <div class="row">
                <div class="col-9 col-md-9">
                  @session('status')
                      <div class="alert alert-success mb-1">
                          {{ $value }}
                      </div>
                  @endsession
                    <div class="card">

                        <div class="card-header">
                            <h4>
                              <a href="{{route('users.index')}}" class="btn btn-lg btn-primary">Users</a>
                              <a href="{{route('roles.index')}}" class="btn btn-lg btn-success">Roles</a>
                              <a href="{{route('permissions.index')}}" class="btn btn-lg btn-info">Permission</a>
                            </h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($roles as $role )
                                  <tr>
                                      <td>{{$role->name}}</td>
                                      <td>
                                        <div class="row">
                                          <div class="col-4 col-md-4">
                                            <a href="{{route('role.permission',$role->id)}}" class="btn btn-lg btn-warning mr-2" title="Add Permission to: {{$role->name}}" >Add /Edit Role Permission</a>
                                          </div>
                                            <div class="col-2 col-md-2">
                                              <a href="{{route('role.edit',$role->id)}}" class="btn btn-lg btn-primary mr-2" title="Edit {{$role->name}}" >Edit</a>
                                            </div>
                                          <div class="col-2 col-md-2">
                                            <form method="POST" action="{{route('role.delete', $role->id)}}">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                                            </form>
                                          </div>
                                        </div>

                                   </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="login-box">
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                <h5>Add Roles</h5>
                            </div>
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
                            <div class="card-body">
                                <form action="{{ route('role.store') }}" method="post">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Enter role name"
                                            name="name">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block">New role</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <!-- /.login-card-body -->
                        </div>
                    </div>
                </div>
                <div>

                    <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


@endsection
