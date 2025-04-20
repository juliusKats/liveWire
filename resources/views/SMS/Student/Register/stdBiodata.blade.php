@extends('SMS._layout._layout')
@section('title')
    Bio Data
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Academ</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
            <div class="breadcrumb-item">Alert</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Alerts</h2>
        <p class="section-lead">
            Provide contextual feedback messages for typical user actions with the handful of available and flexible
            alert messages.
        </p>
        <div class="row">
            <div class="col-md-12 col-12">
                <div hidden="hidden" id="currentStep">1</div>
                <div hidden="hidden" id="totalSteps">9</div>
                <div hidden="hidden" id="nextStep">2</div>
                <div class="card">
                    <h1 class="d-flex justify-content-center">Student Registration</h1>
                </div>
            </div>
        </div>
        <form  method="post" action="{{route('student.save.bio.data')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-6">
                        <div>
                            <img class="offset-3" id="stdAvatar"
                                 src="{{ asset('default/defaultuser.jpg') }}" alt="User Avatar"
                                 style="width:150px;height:150px;border-radius:100px;">
                        </div>
                        <div class="form-group mt-3">
                            <label>Student Photo</label>
                            <input type="file" class="form-control" name="stdphoto" autofocus>
                        </div>
                        @error('stdphoto')<span class="text text-danger">{{ $message }} @enderror
                    </div>
                    <div class="form-group col-6">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="stdfrist_name" autofocus required minlength="3">
                            @error('stdfirst_name')<span class="text text-danger">{{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="stdmiddle_name" minlength="3">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="stdlast_name" required minlength="3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label>Gender</label>
                        <select name="stdGender" class="form-control select2" required minlength="3">
                            <option value="0">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label>Birth Date</label>
                        <input type="date" class="form-control" name="stdDOB" required>
                    </div>
                    <div class="form-group col-4">
                        <label>Nationality</label>
                        <select class="form-control select2" name="stdnationality" minlength="3">
                            <option value="0" selected="selected">Select Nationality</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group mt-2 mb-2">
                    <input  type="submit" class="float-right ml-1 btn btn-success btn-lg" value="Save">
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')

@endsection
