@extends('Layout.Main._partial')
@section('main_title')
    Users List
@endsection
@section('main_content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                  @session('danger')
                  <div class="toast" data-autohide="false">
                    <div class="toast-header">
                      <strong class="mr-auto text-primary">User Delete</strong>
                      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                    </div>
                    <div class="toast-body">{{$value}}</div>
                  </div>
                  @endsession
                    <div class="card">

                        <div class="card-header">
                            <h4>
                              <a href="{{route('users.index')}}" class="btn btn-lg btn-primary">Users</a>
                              <a href="{{route('roles.index')}}" class="btn btn-lg btn-info">Roles</a>
                              <a href="{{route('permissions.index')}}" class="btn btn-lg btn-warning">Permission</a>

                              <a href="{{ route('users.pdf.list') }}" class="btn btn-lg btn-warning float-end float-right ml-1">
                                <i class="fa fa-file-pdf" style="color:red;font-size:24px;"></i> PDF
                            </a>
                            <a href="{{route('add.users')}}" class="btn btn-lg btn-success float-end float-right">Add User</a>
                            </h4>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Avatar</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($users as $user )
                                  <tr>
                                    <td>
                                        <div class="widget-user-image">
                                            <img class="img-circle elevation-2"

                                            @if($user->userimage){
                                              src="/profile/images/{{$user->userimage}}"
                                            }
                                            @else{
                                                src="/default/defaultuser.jpg"
                                            }
                                            @endif
                                            alt="{{$user->name}}" style="width: 70px; height: 70px;">
                                        </div>
                                     </td>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                          <label class="badge badge-primary">{{$rolename}}</label>
                                        @endforeach
                                        @endif
                                      </td>

                                      <td style="display:inline">
                                        <div class="row">
                                            <div class="col-2 col-md-2 m-2">
                                              <a href="{{route('edit.user',$user->id)}}" class="btn btn-lg btn-primary mr-2" title="Edit {{$user->name}}" >Edit</a>
                                            </div>
                                            @if((Auth::user()->id)!=($user->id))
                                          <div class="col-2 col-md-2 m-2">
                                                <form  method="POST" action="{{route('delete.user', $user->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-lg mx-2 btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            @endif
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
              </div>
        </section>
        <!-- /.content -->
    </div>


@endsection

