@extends('Layout.Main._partial')
@section('main_title')New User @endsection
@section('main_content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create New User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add User</li>
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
                      <div class="alert alert-success mb-1">
                          {{ $value }}
                      </div>
                  @endsession
                    <div class="card">

                        <div class="card-header">
                            <h4>Adding New User
                              <a href="{{route('users.index')}}" class="btn btn-lg btn-warning float-end float-right">Back</a>
                            </h4>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                          @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">&times;</button>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          <form  method="post" action="{{route('save.user')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                              <label>Full Name</label>
                              <input type="text" class="form-control" placeholder="Full Name" name="fullname" required autofocus />
                            </div>

                            <div class="form-group mb-3">
                              <label>Email</label>
                              <input type="email" class="form-control" placeholder="johndoe@gmail.com" name="email" required autofocus />
                            </div>

                            <div class="form-group mb-3">
                              <label>Password</label>
                              <input type="password" class="form-control" placeholder="password" name="password" min="8" maxlength="20" required autofocus />
                            </div>
                            <div class="form-group mb-3">
                              <label>Profile </label>
                              <input type="file" class="form-control" placeholder="load im" name="avatar" min="8" maxlength="20" />
                            </div>


                            <div class="form-group mb-3">
                              <label>Roles</label>
                              <!-- <select name="roles[]" class="form-control" multiple> -->
                                <select name="roles[]" class="select2" multiple data-placeholder="Select Roles" style="width: 100%;">
                                  @foreach ($roles as $role)
                                    <option class="text text-black" value="{{$role->name}}">{{$role->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                              <button class="btn btn-success btn-lg" type="submit">Add Users</button>
                            </div>

                          </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
              </div>
        </section>
        <!-- /.content -->
    </div>


@endsection
