@extends('SMS._layout._layout')
@section('title')
    Application Class
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
        <form  method="post" action="{{route('student.register.save')}}" enctype="multipart/form-data">



            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group mt-2 mb-2">
                    <button  type="submit" class="float-right ml-1 btn btn-success btn-lg">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')

@endsection
