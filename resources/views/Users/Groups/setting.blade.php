@extends('Layout.Main._partial')
@section('main_title')
    Group Setting
@endsection
@section('main_content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Team Setting</h1>
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
                    @session('success')
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ $value }}</strong>
                        </div>
                    @endsession
                    <div class="card">
                        <div class="card-body">
                            {{-- Edit Team Innfo --}}
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <h3>Group Name</h3>
                                    <p>The group's name and owner information.</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="card">
                                        <div class="card-header">Group Owner </div>
                                        <div class="card-body">

                                            <div style="display: inline-flex">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    @if ($user->userimage) {
                                                        src="/profile/images/{{ $user->userimage }}"
                                                    }
                                                    @else{
                                                        src="/default/defaultuser.jpg"
                                                    } @endif
                                                    alt="{{ $user->name }}">
                                            </div>
                                            <span>
                                                <h4>{{ $user->name }}</h4>
                                                <h5>{{ $user->email }}</h5><span>
                                                    <hr>
                                                    <form method="POST"
                                                        action="{{ route('group.update', $invitingdetails->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Group Name</label><br>
                                                            <input @if ($invitingdetails->user_id != Auth::user()->id) readonly @endif
                                                            required minlength="3" type="text" name="groupName"
                                                                class="form-control"
                                                                value="{{ $invitingdetails->name }}">
                                                        </div>
                                                        @if ($invitingdetails->user_id == Auth::user()->id)
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-success float-right">UPDATE</button>
                                                            </div>
                                                        @endif

                                                    </form>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2 col-2">

                                </div>
                            </div>
                            <hr>
                            @if ($invitingdetails->user_id == Auth::user()->id)
                                {{-- Adding Team Members --}}
                                <div class="row">
                                    <div class="col-md-4 col-4">
                                        <h3>Add Team Member</h3>
                                        <p>Add a new team member to your team, allowing them to collaborate with you.</p>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        @session('emailError')
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>{{ $value }}</strong>
                                            </div>
                                        @endsession
                                        <div class="card">
                                            <p class="mt-4 ml-4">Please provide the email address of the person you would
                                                like
                                                to add to this team.</p>
                                            <div class="card-body">

                                                <form method="POST"
                                                    action="{{ route('group.invite', Auth::user()->currentTeam->id) }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label><br>
                                                        <input required minlength="3" type="email" name="invitedMail"
                                                            class="form-control">

                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn btn-success float-right">ADD</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-2">

                                    </div>
                                </div>
                                <hr>
                                {{-- Invited Users --}}
                                @if (count($invitees) > 0)
                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <h3>Pending Group Invitations</h3>
                                            <p>These people have been invited to your group and have been sent an invitation
                                                email. They may join the group by accepting the email invitation.</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    @foreach ($invitees as $invitee)
                                                        <div class="form-group">
                                                            {{ $invitee->email }}

                                                            <span class="float float-right text-danger">
                                                                <form class="mr-1" method="POST"
                                                                    action="{{ route('cancel.group.invite', $invitee->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Cancel">
                                                                </form>
                                                            </span>
                                                            <span class="float float-right text-danger">
                                                                <form class="mr-1" method="POST"
                                                                    action="{{ route('accept.group.invite', $invitee->id) }}">
                                                                    @csrf
                                                                    <input class="btn btn-success" type="submit"
                                                                        value="Accept">
                                                                </form>
                                                            </span>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-2"> </div>
                                    </div>
                                    <hr>
                                @endif
                            @endif

                            {{-- Teams am invited to --}}

                                @if (count($userinvitation) > 0)
                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <h3>Teams Am Invited In</h3>
                                            <p>These are the teams you are invited In.</p>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    @foreach ($userinvitation as $team)
                                                        <div class="form-group">
                                                            {{ $team->id }}
                                                            {{ $team->role }}

                                                            <span class="float float-right text-danger">
                                                                <form class="mr-1" method="POST"
                                                                    action="{{ route('cancel.invite', $team->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Cancel">
                                                                </form>
                                                            </span>
                                                            <span class="float float-right text-danger">
                                                                <form class="mr-1" method="POST"
                                                                    action="{{ route('accept.group.invite', $team->id) }}">
                                                                    @csrf
                                                                    <input class="btn btn-success" type="submit"
                                                                        value="Accept">
                                                                </form>
                                                            </span>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-2"> </div>
                                    </div>
                                    <hr>
                                @endif


                            {{-- Members --}}
                            @if (count($groupMember) > 0)
                                <div class="row">
                                    <div class="col-md-4 col-4">
                                        <h3>Group Members</h3>
                                        <p>All of the people that are part of this group.</p>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-valign-middle">
                                                    @foreach ($groupMember as $member)
                                                        <tr>
                                                            <td>
                                                                <img src="{{ asset('main_assets/img/default-150x150.png') }}"
                                                                    alt="Product 1" class="img-circle  mr-2"
                                                                    style="width: 50px; height:50px">
                                                                {{ $member->user_id }}
                                                            </td>
                                                            {{-- <td></td> --}}
                                                            <td style="width:180px">
                                                                <span class="invisible" id="memberID">{{ $member->user_id}}</span>
                                                                <div class="row">
                                                                    <div class="col-6 col-md-6">
                                                                        <a href="#"
                                                                            class="text text-gray">{{ $member->role }}</a>
                                                                    </div>
                                                                    <div class="col-6 col-md-6">
                                                                        @if ($member->user_id == Auth::user()->id)
                                                                            <a id="btnLeave" href=""
                                                                                class="text text-danger">Leave</a>
                                                                        @else
                                                                            <a id="btnDelete" href=""
                                                                                class="text text-danger">Remove</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                @foreach ($groupMember as $member)
                                                    <div class="form-group">
                                                        {{ $member->user_id }}
                                                        <span class="float float-right text-danger">
                                                            @if ($member->user_id == Auth::user()->id)
                                                                <form method="POST"
                                                                    action="{{ route('leave.group', $member->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Leave">
                                                                </form>
                                                            @else
                                                                <form method="POST"
                                                                    action="{{ route('cancel.invite', $member->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="btn btn-danger" type="submit"
                                                                        value="Remove">
                                                                </form>
                                                            @endif
                                                        </span>
                                                        <span
                                                            class="float float-right btn btn-gray">{{ $member->role }}</span>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-2">

                                    </div>
                                </div>
                                <hr>
                            @endif

                            {{-- Deleting Team --}}
                            @if ($invitingdetails->user_id == Auth::user()->id)
                                @if ($invitingdetails->personal_team != 1)
                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <h3>Delete Team</h3>
                                            <p>Permanently delete this team.</p>
                                        </div>


                                        <div class="col-md-6 col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    Once a team is deleted, all of its resources and data will be
                                                    permanently
                                                    deleted.
                                                    Before deleting this team, please download any data or information
                                                    regarding
                                                    this team that you wish to retain.
                                                    <p class="mt-3">
                                                        <a class="btn btn-danger" data-toggle="modal"
                                                            data-target="#deleteTeam">Delete Team</a>
                                                    <p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-2">

                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection
@section('modal')
    <!-- The Modal -->
    <div class="modal overlay" id="deleteTeam">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><i class="rounded mr-2 ion-alert-circled"
                            style="font-size: 24px; color:red"></i>Delete Team {{ Auth::user()->currentTeam->name }}</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you want to delete this Group? Once a team is deleted,
                    all of its resources and data will be permanently deleted.
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <form method="post" action="{{ route('delete.group', Auth::user()->current_group_id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete Group</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page_javascript')
    <script>
        $('#btnDelete').on('click', function() {
            var memberId = document.getElementById('memberID').innerText;
            var URL = "Users/enable/"+ userid+"/twoAuth"
            alert(memberId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });
            $.ajax({
                url: URL,
                type: 'POST',
                method: 'DELETE'
                data: {
                    'id': memberId,
                },
                success: function(data) {
                    console.log(data)
                }
            })
        })
        // $(document).ready(function() {
        //     var memberId = document.getElementById('memberID').innerText;
        //     alert(memberId);
        //     // $('#btnDelete').on('click', function() {
        //     //     alert($id);
        //     //        $.ajaxSetup({
        //     //             headers: {
        //     //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     //             }
        //     //             method:'DELETE'
        //     //         });
        //     //         $.ajax({
        //     //             url: URL,
        //     //             type: 'POST',
        //     //             data: {
        //     //                 'userid': `{{ Auth::user()->id }}`,
        //     //             },
        //     //             success: function (data) {
        //     //                 console.log(data)
        //     //             }
        //     //         })


        //     // });
        // });
    </script>
@endsection
