@extends('Layout.Main._partial')
@section('main_title')
    Create Groups
@endsection
@section('main_content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Group List</h1>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <h3>Group Details</h3>
                                    <p>Create a new group to collaborate with others on projects.</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="card">
                                        <div class="card-header">Group Owner</div>
                                        <div class="card-body">
                                            <div style="display: inline-flex">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    @if (Auth::user()->userimage) {
                                                        src="/profile/images/{{ Auth::user()->userimage }}"
                                                    }
                                                    @else{
                                                        src="/default/defaultuser.jpg"
                                                    } @endif
                                                    alt="{{ Auth::user()->name }}">
                                            </div>
                                            <span><h4>{{ Auth::user()->name }}</h4>
                                            <h5>{{ Auth::user()->email }}</h5><span>
                                            <hr>
                                            <form method="POST" action="{{ route('group.save',Auth::user()->id) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Group Name</label><br>
                                                    <input required minlength="3" type="text" name="groupName" class="form-control" >
                                                  </div>
                                                  <div class="form-group">
                                                    <button type="submit" class="btn btn-success float-right">Create</button>
                                                  </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 col-2">
                                    2
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
              </div>
        </section>
        <!-- /.content -->
    </div>


@endsection
