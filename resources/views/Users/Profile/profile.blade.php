@extends('Layout.Main._partial')
@section('main_title')
    Profile
@endsection
@section('main_content')
    <div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        @if ($user->userimage) {
                                            src="/profile/images/{{ $user->userimage }}"
                                        }
                                        @else{
                                            src="/default/defaultuser.jpg"
                                        } @endif
                                        alt="{{ $user->name }}">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Activity</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @session('error')
                                    <div class="alert alert-danger mb-1">
                                        {{ $value }}
                                    </div>
                                    @endsession
                                    @session('success')
                                    <div class="alert alert-success mb-1">
                                        {{ $value }}
                                    </div>
                                    @endsession
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('main_assets/img/user1-128x128.jpg')}}" alt="user image">
                                                <span class="username">
                                                    <a href="#">Jonathan Burke Jr.</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('main_assets/img/user7-128x128.jpg')}}" alt="User Image">
                                                <span class="username">
                                                    <a href="#">Sarah Ross</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('main_assets/img/user6-128x128.jpg')}}" alt="User Image">
                                                <span class="username">
                                                    <a href="#">Adam Jones</a>
                                                    <a href="#" class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid" src="{{ asset('main_assets/img/photo1.png')}}"
                                                        alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="{{ asset('main_assets/img/photo2.png')}}"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="{{ asset('main_assets/img/photo3.jpg')}}"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
                                                            <img class="img-fluid mb-3" src="{{ asset('main_assets/img/photo4.jpg')}}"
                                                                alt="Photo">
                                                            <img class="img-fluid" src="{{ asset('main_assets/img/photo1.png')}}"
                                                                alt="Photo">
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comments (5)
                                                    </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-danger">
                                                    10 Feb. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent
                                                        you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                        accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented
                                                        on your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                            comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                                                <span class="bg-success">
                                                    3 Jan. 2014
                                                </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded
                                                        new photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <h4>Profile Information</h4>
                                                <p>Update your account's profile information and email address.</p>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="card card-primary">
                                                    <div class="card-body">
                                                        <div class="text-center mb-2">
                                                            <img class="profile-user-img img-fluid img-circle"
                                                                @if ($user->userimage) {
                                                            src="/profile/images/{{ $user->userimage }}"
                                                        }
                                                        @else{
                                                            src="/default/defaultuser.jpg"
                                                        } @endif
                                                                alt="{{ $user->name }}">
                                                        </div>

                                                        <form class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">Name</label>
                                                                <input type="name" class="form-control" id="inputName"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName"
                                                                    class="col-form-label">Email</label>
                                                                <input type="email" name="email" class="form-control"
                                                                    id="inputEmail" value="{{ $user->email }}"
                                                                    @if (!empty($user->email_verified_at)) { readonly="readonly" } @endif />
                                                                @if (empty($user->email_verified_at))
                                                                    Your email address is unverified. <a
                                                                        href="{{ verification.send }}">Click here to
                                                                        re-send the verification email.</a>
                                                                @endif
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName"
                                                                    class="col-form-label">Mobile</label>
                                                                <input type="text" name="mobile" class="form-control m-1"
                                                                    id="inputEmail" value="{{ $user->mobile }}">
                                                                @if(!empty($user->mobile))
                                                                    @if (!($user->verifymobile))
                                                                    Your Phone Number is unverified. <button  data-toggle="modal" data-target="#verifysms" class="btn">Send Code</button>
                                                                    @endif
                                                                @endif
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-right">Save</button>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <h4>Update Password</h4>
                                                <p> Ensure your account is using a long, random password to stay secure.</p>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="card card-primary">
                                                    <div class="card-body">
                                                        <form method="post" class="form-horizontal" action="{{route('update.newpassord')}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">Current
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="currentPass" name="currentPass">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="nemPass" name="newPass">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">Confirm
                                                                    Pass</label>
                                                                <input type="password" class="form-control"
                                                                    id="nonfirmPass" name="confirmnewPass">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-right">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <h4>Two Factor Authentication</h4>
                                                <p>Add additional security to your account using two factor authentication.
                                                </p>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="card card-primary">

                                                    <div class="card-body">
                                                        @if (!empty($user->two_factor_secret))
                                                            @if (!empty($user->two_factor_secret) && empty($user->two_factor_confirmed_at))
                                                                <h5>Finish enabling two factor authentication</h5>
                                                            @else
                                                                <h5>You have enabled two factor authentication.</h5>
                                                            @endif
                                                        @else
                                                            <h5 class="m-2"><strong>You have not enabled two factor
                                                                    authentication.</strong></h5>
                                                        @endif
                                                        <div class="mt-1">
                                                            <p style="font-size: 15px">
                                                                When two factor authentication is enabled, you will be
                                                                prompted for a secure, random token during authentication.
                                                                You may retrieve this token from your phone&#039;s Google
                                                                Authenticator application.
                                                            </p>
                                                            @if (!empty($user->two_factor_secret) && empty($user->two_factor_confirmed_at))
                                                                <p style="font-size: 15px">
                                                                    To finish enabling two factor authentication, scan the
                                                                    following QR code using your phone's authenticator
                                                                    application or enter the setup key and provide the
                                                                    generated OTP code.
                                                                </p>
                                                                <div class="mt-2 p-2 inline-block bg-white">
                                                                    {!! $user->twoFactorQrCodeSvg() !!}
                                                                </div>
                                                                <div class="mt-2">
                                                                    <h5>Setup Key:
                                                                        <strong>{{ decrypt($user->two_factor_secret) }}</strong>
                                                                    </h5>
                                                                </div>
                                                                <form method="POST" action="{{route('verify.two-factor')}}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group row">
                                                                        <label for="inputName"
                                                                            class="col-form-label">Code</label>
                                                                        <input inputmode="numeric" type="text"
                                                                            class="form-control" placeholder="Password"
                                                                            name="verifyCode">
                                                                    </div>
                                                                    <div class="form-group float-left">
                                                                        <input type="submit" class="btn btn-success"
                                                                            value="Confirm">
                                                                        <input type="reset" data-dismiss="modal"
                                                                            class="btn btn-default" value="Cancel"
                                                                            id="authverification">

                                                                    </div>

                                                                </form>
{{--                                                                <form method="post" action="{{route('disable.two-factor')}}">--}}
{{--                                                                    @method('DELETE')--}}
{{--                                                                    <input type="submit" value="Disable">--}}
{{--                                                                </form>--}}
                                                            @elseif(!empty($user->two_factor_secret) && !empty($user->two_factor_confirmed_at))
                                                                <p id="codestore"></p>
                                                                <div id="showbox" hidden>
                                                                    @foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
                                                                        {{ $code }}<hr>
                                                                    @endforeach

                                                                </div>
                                                                <div id="generatebox" class="form-group float-left" hidden>
                                                                    <button id="generatecodes" class="btn btn-success m-1">GENERATE RECOVERY CODE</button>
                                                                    <button id="disableauth2" class="btn btn-danger"> DISABLE</button>
                                                                </div>
                                                                <div id="showdiv" class="form-group float-left">
                                                                        <button id="showcodes" class="btn btn-success m-1">SHOW RECOVERY CODE</button>
                                                                        <button id="disableauth" class="btn btn-danger"> DISABLE</button>
                                                                </div>



                                                                {{-- <p style="font-size: 15px">
                                                                    Store these recovery codes in a secure password manager.
                                                                    They can be used to recover access to your account if
                                                                    your two factor authentication device is lost.
                                                                </p>
                                                                <div class="grid gap-1 max-w-xl ml-4 px-4 py-4 font-mono text-sm rounded-lg" style="border-width: 1px; border-color:blue" >
                                                                    @foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
                                                                        <div>{{ $code }}</div>
                                                                    @endforeach
                                                                </div>
                                                                <form method="POST">
                                                                    <div class="form-group float-left">
                                                                        <input type="submit" class="btn btn-success"
                                                                            value="REGENERATE CODES">
                                                                        <input type="reset" data-dismiss="modal"
                                                                            class="btn btn-danger" value="DISABLE"
                                                                            id="disableAuth">
                                                                    </div>

                                                                </form> --}}
                                                            @else
                                                                @if (empty($user->two_factor_secret) && empty($user->two_factor_confirmed_at))
                                                                    <button type="button" class="btn btn-primary"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-primary">Enable</button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger">Disable</button>
                                                                @endif

                                                            @endif
                                                        </div>
                                                        {{-- <form class="form-horizontal">
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">Current Password</label>
                                                                <input type="password" class="form-control" id="currentPass" name="currentPass">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">New Password</label>
                                                                <input type="password" class="form-control" id="nemPass" name="newPass">
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-form-label">Confirm Password</label>
                                                                <input type="name" class="form-control" id="nonfirmPass" name="confirmPass">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary float-right">Save</button>
                                                            </div>
                                                        </form> --}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5 col-md-5">
                                                <h4>Browser Sessions</h4>
                                                <p>
                                                    Manage and log out your active sessions on other browsers and devices</p>
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <div class="card card-primary">
                                                    <div class="card-body">
                                                        <p>If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.</p>
                                                         @if (count($userssesions) > 0)
                                                        <div class="mt-5 space-y-6">
                                                            @foreach($userssesions as $session)
                                                            <div class="flex items-center">
                                                                <div>
                                                                    {{-- @if ($session->user_agent->isDesktop())
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-500">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                                                        </svg>
                                                                    @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-gray-500">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                                                        </svg>
                                                                    @endif --}}
                                                                </div>

                                                                <div class="ms-3">
                                                                    {{-- <div class="text-sm text-gray-600 dark:text-gray-400">
                                                                        {{ $session->user_agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                                                                    </div> --}}
                                                                    <div>
                                                                        <div class="text-xs text-gray-500">
                                                                            {{ $session->ip_address }},

{{--                                                                            {{ $session->user_agent->system}}--}}

{{--                                                                            @if ($session->is_current_device)--}}
{{--                                                                                <span class="text-green-500 font-semibold">{{ __('This device') }}</span>--}}
{{--                                                                            @else--}}
{{--                                                                                {{ __('Last active') }} {{ $session->last_active }}--}}
{{--                                                                            @endif--}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <strong class="text-danger">{{$session->ip_address}}</strong>
                                                                {{$session->user_agent}}<hr> --}}
                                                            @endforeach
{{--                                                            {{$userssesions}}--}}
{{--                                                            @foreach ($userssesions as $session)--}}
{{--                                                            {{ $session }}--}}
{{--                                                            @endforeach--}}
                                                        </div>
                                                         @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>For your security, please confirm your password to continue.</p>
                    <form id="VerifyAuthConfirm" method="post" action="{{route('enable.two-factor')}}">
                        @csrf
                        <div class="form-group row">
                            <input readonly type="email" class="form-control col-10" value="{{Auth::user()->email}}">
                            <label id="userid" class="form-control col-1 ml-1 text-center"> {{Auth::user()->id}}</label>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-form-label">Confirm Password</label>
                            <input id="passVerifyInput" type="password" class="form-control" placeholder="Password"
                                name="authPasswordVerify">
                            <span id="passErr"></span>
                        </div>
                        <div class="form-group float-right">
                            <input id="SaveAuthDataBtn" type="submit" class="btn btn-success" value="Confirm">
                            <input type="reset" data-dismiss="modal" class="btn btn-default" value="Cancel">
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="verifysms">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>For your security, please confirm your password to continue.</p>
                    <form id="VerifyAuthConfirm" method="post" action="{{route('enable.two-factor')}}">
                        @csrf
                        <div class="form-group row">
                            <input readonly type="email" class="form-control col-10" value="{{Auth::user()->email}}">
                            <label id="userid" class="form-control col-1 ml-1 text-center"> {{Auth::user()->id}}</label>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-form-label">Confirm Password</label>
                            <input id="passVerifyInput" type="password" class="form-control" placeholder="Password"
                                name="authPasswordVerify">
                            <span id="passErr"></span>
                        </div>
                        <div class="form-group float-right">
                            <input id="SaveAuthDataBtn" type="submit" class="btn btn-success" value="Confirm">
                            <input type="reset" data-dismiss="modal" class="btn btn-default" value="Cancel">
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('page_javascript')
    <script src="{{ asset('main_assets/pages/profile.js')}}"></script>

@endsection
