@extends('SMS._Layout._layout')

@section('title')
    Student-Registration
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
            @if ($errors->any())
                <div class="row">
                    <div class="col-md-12 col-12 alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><strong>{{ $error }}</strong> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form method="post" action="{{ route('student.register.save') }}" enctype="multipart/form-data">
                @csrf
                {{--                <div class="row"> --}}
                <div class="col-md-12 col-12">
                    <div class="card bg-dark text-white">
                        <h4 id="step-count" class="d-flex justify-content-center">Step 1 Out of 8
                        </h4>
                    </div>
                </div>


                {{--                    @if ($currentStep == 1) --}}
                <div id="step1">
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="form-group col-6">
                                <div>
                                    <img class="offset-3" id="stdAvatar" src="{{ asset('default/defaultuser.jpg') }}"
                                        alt="User Avatar" style="width:150px;height:150px;border-radius:100px;">
                                </div>
                                <div class="form-group mt-3">
                                    <label>Student Photo</label>
                                    <input type="file" class="form-control" name="stdphoto" autofocus>

                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="form-group">
                                    <label>First Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="stdfirst_name" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="stdmiddle_name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="stdlast_name">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-4">
                                <label>Gender</label><strong class="text text-danger">*</strong>
                                <select id="gender" name="stdGender" class="form-control select2"> {{ old('stdGender') }}
                                    <option value="0">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Religion</label><strong class="text text-danger">*</strong>
                                <select id="gender" name="stdReligion" class="form-control select2">
                                    <option value="0">Select Religion</option> {{ old('Religion') }}
                                    @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Birth Date</label><strong class="text text-danger">*</strong>
                                <input type="date" class="form-control datetimepicker" name="stdDOB">
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="form-group col-4">
                                <label>Both Parents Alive?</label><br><strong class="text text-danger">*</strong>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="alive" value="1">
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="alive" value="0">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <div class="form-group col-4">
                                <label>Telephone</label>
                                <input type="text" class="form-control numeric" name="stdTel">
                            </div>
                            <div class="form-group col-4">
                                <label>Email</label>
                                <input type="email" class="form-control" name="stdEmail">
                            </div>
                        </div>

                        <hr>
                    </div>
                </div>
                {{--                    @elseif($currentStep==2) --}}
                <div id="step2" hidden="hidden">

                    <div class="card-body">
                        Student Address
                        <div class="form-divider">Your Home</div>
                        <div class="row form-group">
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">
                                <label>Country</label><strong class="text text-danger">*</strong><br>
                                    <select id="stdcountry" class="form-controls select2" name="stdcountry"> {{ old('stdcountry') }}
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Nationality</label><strong class="text text-danger">*</strong><br>
                                <select id="stdnat" class="form-controls select2" name="stdnationality"> {{ old('stdnationality') }}
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">

                                <label>District/State</label><br>
                                <div id="combdistrict">
                                <select id="stdDist" class="form-controls select2"  name="stdDistrict"> {{ old('stdDistrict') }}

                                </select>
                                </div>
                                <input hidden="hidden" id="tbDistrict" type="text" class="form-control" name="stdDistrict">
                            </div>
                            <div class="form-group col-6">
                                <label>City</label>
                                    <div id="combCity">
                                        <select id="stdCity" class="form-controls select2"  name="stdCity"> {{ old('stdCity') }}
                                        </select>
                                        </div>
                                    <input hidden="hidden" id="tbCity" name="stdCity" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">
                                <label>province</label>
                                <input name="stdProvince"type="text" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>County</label>
                                <input name="stdCounty" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">
                                <label>Sub-County</label>
                                <input name="stdSubcounty"type="text" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Parish</label>
                                <input name="stdParish"type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">
                                    <label>Address</label><strong class="text text-danger">*</strong><br>
                                    <textarea name="stdAddress" style="height:4000px;" class="summernote-simple"></textarea>
                            </div>
                            <div class="form-group col-6"></div>
                        </div>
                    </div>
                </div>


                {{--                    @elseif($currentStep==3) --}}
                <div id="step3" hidden="hidden">
                    <div class="card-body">
                        <hr style="height:10px;">
                        <div class="form-divider">Emmergency Contacts</div>
                        <div class="row form-group">
                            <div class="form-group col-3">
                                <label>First Name</label><strong class="text text-danger">*</strong>
                                <input type="text" class="form-control" name="emFname" autofocus>
                            </div>
                            <div class="form-group col-3">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="emMname">
                            </div>
                            <div class="form-group col-3">
                                <label>Last Name</label><strong class="text text-danger">*</strong>
                                <input type="text" class="form-control" name="emLname">
                            </div>
                            <div class="form-group col-3">
                                <label>Student Relationship</label><strong class="text text-danger">*</strong><br>
                                <select class="form-controls select2" name="emRelation">
                                    {{ old('emRelation') }}
                                    <option> --- Select Relationship type ---- </option>
                                    @foreach ($relations as $relation)
                                        <option value="{{ $relation->id }}">{{ $relation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-3">
                                <label>Emergency Type</label><strong class="text text-danger">*</strong><br>
                                <select class="form-controls select2" name="emType">
                                    {{ old('emType') }}
                                    <option> --- Select Contact type ---- </option>
                                    @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label>Mobile Number</label><strong class="text text-danger">*</strong>
                                <input type="tel" class="form-control" name="emMobile">
                            </div>
                            <div class="form-group col-3">
                                <label>Alternative Number</label>
                                <input type="tel" class="form-control" name="emTel">
                            </div>
                            <div class="form-group col-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="emMail">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-6">
                                <label>Address</label>
                                <textarea name="emAddress" class="summernote-simple"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <div>
                                    <img class="offset-3" id="stdAvatar" src="{{ asset('default/defaultuser.jpg') }}"
                                        alt="User Avatar" style="width:150px;height:150px;border-radius:100px;">
                                </div>
                                <div class="form-group mt-4">
                                    <label>Emmergency Photo</label>
                                    <input type="file" class="form-control" name="emphoto" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                    @elseif($currentStep==4) --}}
                <div id="step4" hidden="hidden">
                    <div class="card-body">
                        <div class="form-divider">Application Class</div>
                        <div class="row form-group">
                            <div class="form-group col-4">
                                <label>Academic Year</label><strong class="text text-danger">*</strong><br>
                                <select name="regYear" id="acYear" class="form-controls select2">{{ old('regYear') }}
                                    <option value="0"> ---- Select Registration Year -----</option>

                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Term</label><strong class="text text-danger">*</strong><br>
                                <select name="regTerm" id="acTerm" class="form-controls select2">{{ old('regTerm') }}
                                    <option value="0" selected="selected"> --- Select class --- </option>

                                    @foreach ($terms as $term)
                                        <option value="{{ $term->id }}">{{ $term->term }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label>Section</label><strong class="text text-danger">*</strong><br>
                                <select class="form-controls select2" name="stdsection">{{ old('stdsection') }}
                                    <option value="0"> ---- Select Section -----</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="form-group col-3">
                                <label>Level</label><strong class="text text-danger">*</strong><br>
                                <select name="regLevel" id="stdLevel" class="form-controls select2">{{ old('stdsLevel') }}
                                    <option value="0" selected="selected"> --- Select Level --- </option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label>class</label><br>
                                <select name="stdclass" id="stdclass" class="form-controls select2">{{ old('stdclass') }}</select>
                            </div>
                            <div class="form-group col-6">
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>stream</label><br>
                                        <select name="stdstream" id="stdstream" class="form-controls select2">{{ old('stdclass') }}</select>
                                    </div>
                                    <div class="col-6">
                                        <label>Combination</label><br>
                                        <select name="stdcomb" id="stdcomb" class="form-controls select2">{{ old('stdclass') }}</select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div hidden="hidden" class="row form-group" id="AdvancedSection">
                            <div class="form-group col-6" id="AlevelStreams">
                                <label>Stream</label><strong class="text text-danger">*</strong><br>
                                <select name="stdstream" id="AStreams" class="form-controls select2">{{ old('stdstream') }}
                                    <option value="0" selected="selected"> --- Select Stream --- </option>
                                    @foreach ($AStreams as $stream)
                                        <option value="{{ $stream->id }}">{{ $stream->stream->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="AlevelCombinations" class="form-group col-6">
                                <label>Subject Combination </label><strong class="text text-danger">*</strong><br>
                                <select name="stdcomb" id="ACombinations" class="form-controls select2">{{ old('stdcomb') }}
                                    <option value="0" selected="selected"> --- Select Combination --- </option>
                                    @foreach ($allcombs as $combs)
                                        <option value="{{ $combs->id }}">{{ $combs->Combination }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <hr />
                        <div hidden="hidden" id="ple">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">PLE PERFORMANCE</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-divider">Primary Information</div>
                            <div class="row form-group">
                                <div class="form-group col-6">
                                    <label>Former School</label><strong class="text text-danger">*</strong>
                                    <input type="text" name="pleSchool" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label>PLE Year</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="pleYear" min="1900"
                                        minlength="4" maxlength="4">
                                </div>
                                <div class="form-group col-3">
                                    <label>PLE Index</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="pleIndex">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-2">
                                    <label>English</label><strong class="text text-danger">*</strong>
                                    <input id="pleEng" type="text" class="agg form-control" name="pleEng"
                                        min="1" max="9" minlength="1" maxlength="1">
                                </div>
                                <div class="form-group col-2">
                                    <label>Maths</label><strong class="text text-danger">*</strong>
                                    <input id="pleMath" type="text" class="agg form-control" name="pleMath"
                                        min="1" max="9" minlength="1" maxlength="1">
                                </div>
                                <div class="form-group col-2">
                                    <label>Science</label><strong class="text text-danger">*</strong>
                                    <input id="pleScie" type="text" class="agg form-control" name="pleScience"
                                        min="1" max="9">
                                </div>
                                <div class="form-group col-2">
                                    <label>S.S.T</label><strong class="text text-danger">*</strong>
                                    <input id="pleSST" type="text" class="agg form-control" name="pleSST"
                                        min="1" max="9" minlength="1" maxlength="1">
                                </div>
                                <div class="form-group col-2">
                                    <label>Aggregate</label><strong class="text text-danger">*</strong>
                                    <input readonly id="totalagg" type="text" class="form-control" name="pleAggs"
                                        min="4" max="36" minlength="1" maxlength="2">
                                </div>
                                <div class="form-group col-2">
                                    <label>Division</label><strong class="text text-danger">*</strong><br>
                                    <select name="pleDivision" class="form-controls select2">
                                        <option value="0"> --- Select Division --- </option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div hidden="hidden" id="uce">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">UCE PERFORMANCE</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12 col-md-12">
                                    <div class="alert alert-success">
                                        <strong>
                                            <h6 id="strongSubjects">Select the Subjects you did in S.4 (Min 8 and
                                                max 10)</h6>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-4">
                                    <label>Former Olevel School</label><strong class="text text-danger">*</strong>
                                    <input type="text" name="uceSchool" class="form-control">
                                </div>
                                <div class="form-group col-2">
                                    <label>UCE Year</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="uceYear" min="1900"
                                        minlength="4" maxlength="4">
                                </div>
                                <div class="form-group col-2">
                                    <label>UCE Index</label>
                                    <input type="text" class="form-control" name="uceIndex">
                                </div>
                                <div class="form-group col-2">
                                    <label>Aggregates (Best 8)</label>
                                    <input id="totOAgg" type="text" class="form-control" name="uceAgg"
                                        min="4" max="72" minlength="1" maxlength="2">
                                </div>
                                <div class="form-group col-2">
                                    <label>Division</label><br><strong class="text text-danger">*</strong>
                                    <select name="uceDivision" class="form-controls select2">
                                        <option value="0"> ---- Select Division ---- </option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                @foreach ($Osubjs as $Osubj)
                                    <div class="col-4">
                                        <div class="row form-group mb-1">
                                            <div class="col-2">
                                                <input name="uceSubjects[]" type="checkbox" class="txtsubj form-control"
                                                    value="{{ $Osubj->id }}"
                                                    @if ($Osubj->isComp == 'Compulsory') checked="checked" @endif>
                                            </div>
                                            <div class="col-8">
                                                <label for="subject_code"> {{ $Osubj->code }} -
                                                    {{ $Osubj->name }}
                                                </label>
                                            </div>
                                            <div class="col-2">
                                                <input type="text" class="OAgg form-control" max="9"
                                                    min="1" minlength="1" maxlength="1" name="OlSelected[]">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                {{--                    @elseif($currentStep==5) --}}
                <div id="step5" hidden="hidden">
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12 col-12">
                                <div class="card bg-dark text-white">
                                    <h4 class="d-flex justify-content-center">Parent's Information</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="height:10px;">
                        <div class="form-group">
                            <label>Living With</label><strong class="text text-danger">*</strong><br>
                            <div class="row form-group">
                                <input onclick="CHECK()" id="both" class="form-control col-1" type="radio"
                                    name="livewith" value="both">
                                <label class="col-2">Both Parents</label>
                                <input onclick="CHECK()" id="father"class="form-control col-1" type="radio"
                                    name="livewith" value="father">
                                <label class="col-2">Father</label>
                                <input onclick="CHECK()" id="mother" class="form-control col-1" type="radio"
                                    name="livewith" value="mother">
                                <label class="col-2">Mother</label>
                                <input onclick="CHECK()" id="other" class="form-control col-1" type="radio"
                                    name="livewith" value="other">
                                <label class="col-2">Other/Guardian</label>
                            </div>
                        </div>
                        <div hidden="hidden" id="bothF">
                            <hr style="height:10px;">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">Father's Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-divider">Father's Details</div>

                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>First Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="ffname" autofocus>
                                </div>
                                <div class="form-group col-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="fmname">
                                </div>
                                <div class="form-group col-3">
                                    <label>Last Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="flname">
                                </div>
                                <div class="form-group col-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="femail" autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Mobile Number</label><strong class="text text-danger">*</strong>
                                    <input type="tel" class="form-control" name="fmobile" autofocus>
                                </div>
                                <div class="form-group col-3">
                                    <label>Alternative Number</label>
                                    <input type="text" class="form-control" name="ftel">
                                </div>
                                <div class="form-group col-3">
                                    <label>Identity Type</label><strong class="text text-danger">*</strong>
                                    <select class="form-controls select2" name="fidtype">
                                        <option value="0" selected="selected">--- Select IDvType ---</option>
                                        @foreach ($identities as $identity)
                                            <option id="{{ $identity->id }}">{{ $identity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>ID Number</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="fidno" autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Country of Residence</label><strong class="text text-danger">*</strong><br>
                                    <select  class="form-controls select2" name="fcountry">
                                        <option value="0" selected="selected">---- Select Country ---</option>
                                        @foreach ($countries as $county)
                                            <option id="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Nationality</label><strong class="text text-danger">*</strong><br>
                                    <select id="stdcountry"
                                        class="form-controls select2"name="fnationality">
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option id="{{ $county->id }}">{{ $county->nationality }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Province</label>
                                    <input name="FatherProvince"type="text" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label>District</label>
                                    <input type="text" class="form-control" name="fdistrict">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="fcity">
                                </div>
                                <div class="form-group col-3">
                                    <label>County</label>
                                    <input type="text" class="form-control" name="fcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Sub-County</label>
                                    <input type="text" class="form-control" name="fsubcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Parish</label>
                                    <input type="text" class="form-control" name="fparish">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-6">
                                    <label>Address</label>
                                    <textarea name="faddress" class="summernote-simple"></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <div>
                                        <img class="offset-3" id="stdAvatar"
                                            src="{{ asset('default/defaultuser.jpg') }}" alt="User Avatar"
                                            style="width:150px;height:150px;border-radius:100px;">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Avatar</label>
                                        <input type="file" class="form-control" name="fphoto" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hidden="hidden" id="bothM">
                            <hr style="height:10px;">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">Mother's Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-divider">Mother's Details</div>

                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>First Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="mfname" autofocus>
                                </div>
                                <div class="form-group col-3">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="mmname">
                                </div>
                                <div class="form-group col-3">
                                    <label>Last Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="mlname">
                                </div>
                                <div class="form-group col-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="memail" autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Mobile Number</label><strong class="text text-danger">*</strong>
                                    <input type="tel" class="form-control" name="mmobile" autofocus>
                                </div>
                                <div class="form-group col-3">
                                    <label>Alternative Number</label>
                                    <input type="text" class="form-control" name="mtel">
                                </div>
                                <div class="form-group col-3">
                                    <label>Identity Type</label><strong class="text text-danger">*</strong>
                                    <select class="form-controls select2" name="midtype">>
                                        <option value="0" selected="selected">Select Relationship</option>
                                        @foreach ($identities as $identity)
                                            <option value="{{ $identity->id }}">{{ $identity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>ID Number</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="midno" autofocus>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Country of Residence</label><strong class="text text-danger">*</strong><br>
                                    <select class="form-controls select2" name="mcountry">
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Nationality</label><strong class="text text-danger">*</strong><br>
                                    <select id="stdcountry"
                                        class="form-controls select2"name="mnationality">
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Province</label>
                                    <input name="mprovince"type="text" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label>District</label>
                                    <input type="text" class="form-control" name="mdistrict">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="mcity">
                                </div>
                                <div class="form-group col-3">
                                    <label>County</label>
                                    <input type="text" class="form-control" name="mcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Sub-County</label>
                                    <input type="text" class="form-control" name="msubcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Parish</label>
                                    <input type="text" class="form-control" name="mparish">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-6">
                                    <label>Address</label>
                                    <textarea name="maddress" class="summernote-simple"></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <div>
                                        <img class="offset-3" id="stdAvatar"
                                            src="{{ asset('default/defaultuser.jpg') }}" alt="User Avatar"
                                            style="width:150px;height:150px;border-radius:100px;">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Avatar</label>
                                        <input type="file" class="form-control" name="mphoto" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div hidden="hidden" id="bothG">
                            <hr style="height:10px;">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">Guardian's Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="form-divider">Guardian's Details</div>
                            <div class="row form-group">
                                <div class="form-group col-4">
                                    <label>First Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="gfname" autofocus>
                                </div>
                                <div class="form-group col-4">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control" name="gmname">
                                </div>
                                <div class="form-group col-4">
                                    <label>Last Name</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="glname">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-4">
                                    <label>Mobile Number</label><strong class="text text-danger">*</strong>
                                    <input type="tel" class="form-control" name="gmobile" autofocus>
                                </div>
                                <div class="form-group col-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="gemail" autofocus>
                                </div>

                                <div class="form-group col-4">
                                    <label>Alternative Number</label>
                                    <input type="text" class="form-control" name="gtel">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Relationship</label><strong class="text text-danger">*</strong><br>
                                    <select class="form-controls select2" name="grelation">
                                        <option value="0" selected="selected">Select Relationship</option>
                                        @foreach ($relations as $relation)
                                            <option value="{{ $relation->id }}">{{ $relation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Identity Type</label><strong class="text text-danger">*</strong><br>
                                    <select class="form-controls select2" name="gidtype">>
                                        <option value="0" selected="selected">Select Relationship</option>
                                        @foreach ($identities as $identity)
                                            <option value="{{ $identity->id }}">{{ $identity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>ID Number</label><strong class="text text-danger">*</strong>
                                    <input type="text" class="form-control" name="gidno" autofocus>
                                </div>
                                <div class="form-group col-3">
                                    <label>Country of Residence</label><strong class="text text-danger">*</strong><br>
                                    <select class="form-controls select2" name="gcountry">
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>Nationality</label><strong class="text text-danger">*</strong><br>
                                    <select id="stdcountry" class="form-controls select2"
                                        name="gnationality">
                                        <option value="0" selected="selected">Select Country</option>
                                        @foreach ($countries as $county)
                                            <option value="{{ $county->id }}">{{ $county->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <label>Province</label>
                                    <input name="gprovince"type="text" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label>District</label>
                                    <input type="text" class="form-control" name="gdistrict">
                                </div>
                                <div class="form-group col-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="gcity">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-3">
                                    <label>County</label>
                                    <input type="text" class="form-control" name="gcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Sub-County</label>
                                    <input type="text" class="form-control" name="gsubcounty">
                                </div>
                                <div class="form-group col-3">
                                    <label>Parish</label>
                                    <input type="text" class="form-control" name="gparish">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="form-group col-6">
                                    <label>Address</label>
                                    <textarea name="gaddress" class="summernote-simple"></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <div>
                                        <img class="offset-3" id="stdAvatar"
                                            src="{{ asset('default/defaultuser.jpg') }}" alt="User Avatar"
                                            style="width:150px;height:150px;border-radius:100px;">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label>Avatar</label>
                                        <input type="file" class="form-control" name="gphoto" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                    @elseif($currentStep==6) --}}
                <div id="step6" hidden="hidden">
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12 col-12">
                                <div class="card bg-dark text-white">
                                    <h4 class="d-flex justify-content-center">Medical Infrormation</h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Do you have any Medical Condition?</label><strong
                                class="text text-danger">*</strong><br>
                            <div class="row form-group">
                                <input onclick="MEDICAL()" id="yes" class="form-control col-1" type="radio"
                                    name="medical" value="1">
                                <label class="col-1">YES</label>
                                <input onclick="MEDICAL()" id="no"class="form-control col-1" type="radio"
                                    name="medical" value="0">
                                <label class="col-1">NO</label>
                            </div>
                        </div>
                        <div hidden="hidden" id="medical">
                            <hr style="height:10px;">
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="card bg-dark text-white">
                                        <h4 class="d-flex justify-content-center">MEDICAL CONDITION DETAILS</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Conditon Name</label><strong class="text text-danger">*</strong>
                                        <input type="text" class="form-control" name="medicalName" autofocus
                                            minlength="20" maxlength="30">
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Conditon Details</label><strong class="text text-danger">*</strong>
                                        <textarea name="medicalDescription" placeholder="Enter Text Here" class="summernote"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{--                    @elseif($currentStep==7) --}}
                <div id="step7" hidden="hidden">
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12 col-12">
                                <div class="card bg-dark text-white">
                                    <h4 class="d-flex justify-content-center">Rules and Regulations (Terms and Conditions)
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group overflow-auto">
                            <div class="form-group col-12 col-md-12 col-lg-12">

                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in
                                voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in
                                culpa qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in
                                voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in
                                culpa qui officia deserunt mollit anim id est laborum.


                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in
                                voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in
                                culpa qui officia deserunt mollit anim id est laborum.


                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident,
                                sunt in culpa
                                qui officia deserunt mollit anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in
                                voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in
                                culpa qui officia deserunt mollit anim id est laborum.


                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree"
                                        style="width: 20px; height:20px">
                                    <label class="custom-control-label" for="agree">I agree with the terms and
                                        conditions</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--                    @elseif($currentStep==8) --}}
                <div id="step8" hidden="hidden">
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12 col-12">
                                <div class="card bg-dark text-white">
                                    <h4 class="d-flex justify-content-center">For Official Use Only (Comment)</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Official Comment</label><strong class="text text-danger">*</strong>
                                    <textarea name="officialComment" placeholder="Enter Text Here" class="summernote"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                    @endif --}}
                {{--                </div> --}}

                <div class="row form-group">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group mt-2 mb-2">

                            {{--                        @if ($currentStep === $totalSteps) --}}
                            <button hidden="hidden" id="btnSubmit" class="float-right ml-1 btn btn-primary btn-lg">
                                Submit
                            </button>
                            {{--                        @endif --}}
                            {{--                        @if ($currentStep > 1) --}}
                            <a hidden="hidden" id="btnPrevious" class="float-right mr-1 btn btn-primary btn-lg">
                                Previous
                            </a>
                            {{--                        @endif --}}
                            {{--                        @if ($currentStep < $totalSteps) --}}
                            <a id="btnNext" class="btn btn-primary btn-lg">
                                Next
                            </a>
                            {{--                        @endif --}}

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection

@section('scripts')

@endsection
