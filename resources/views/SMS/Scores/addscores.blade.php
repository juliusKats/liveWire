@extends('SMS._layout._layout')
@section('title')
    Academic Managemnt
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blank Page</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-3 col-md-3 col-sm-3"></div>
                <div class="col-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <form method="POST" enctype="multipart/form-data" action="">
                            <input type="file"  name="excel">
                            <input type="submit" value="UPLOAD SCORES" class="btn btn-lg btn-warning">
                            </form>
                        </div>
                        <div class="card-body">
                            <div hidden="hidden" id="errorbox" class="col-md-12 col-12 alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <h6 id="alertText"></h6>
                            </div>
                            <form  method="post" action="{{ route('save.scores') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="form-group col-6">
                                        <label>Year</label><br>
                                        <select name="year" id="year" class="form-control select2 ">{{ old('year') }}
                                            <option value="0"> ---- select year ---- </option>
                                            @foreach ($years as $item)
                                            <option value="{{$item->id}}"> {{$item->year}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Term</label><br>
                                        <select name="term" id="term" class="form-control select2">{{ old('term') }}</select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-6">
                                        <label>Level</label><br>
                                        <select name="level" id="level" class="form-control select2">{{ old('level') }}
                                            <option value="0"> ---- select term ---- </option>
                                            @foreach ($levels as $item)
                                            <option value="{{$item->id}}"> {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Class</label><br>
                                        <select name="class" id="class" class="form-control select2">{{ old('class') }}</select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="form-group col-6">
                                        <label>Streams</label><br>
                                        <select name="stream" id="stream" class="form-control select2 " >{{ old('stream') }}</select>
                                    </div>
                                    <div class="col-6">
                                        <label>Student</label><br>
                                        <select name="student" id="student" class="form-control select2">{{ old('student') }}</select>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="form-group col-6">
                                        <label>Subject</label><br>
                                        <select name="subject" id="subject" class="form-control select2">{{ old('subject') }}</select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Paper</label><br>
                                        <select name="paper" id="paper" class="form-control select2">{{ old('paper') }}</select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="form-group col-6">
                                        <label>Objectives</label><br>
                                        <select name="objective" id="objective" class="form-control select2" >{{ old('objective') }}</select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Exam Set</label><br>
                                        <select name="examset" id="examset" class="form-control select2">{{ old('examset') }}
                                            <option value="0"> ---- select Exam Set ---- </option>
                                            @foreach ($examsets as $item)
                                            <option value="{{$item->id}}"> {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                    <div class="form-group col-6">
                                        <label>Score</label>
                                        <input type="text" name="score" id="score" class="form-control" min="0" max="100">
                                    </div>
                                    <div class="form-group col-6">
                                        <label>Grade</label>
                                        <select name="grade" id="objective" class="form-control select2" >{{ old('paper') }}
                                            <option value="0"> --- Select Grade --- </option>
                                            @foreach ($grades as $item)
                                            <option value="{{$item->id}}">{{$item->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="form-group col-9">
                                        <input type="submit" class="btn btn-lg btn-success" Value="Save Scores" id="btnsave" hidden="hidden">
                                    </div>
                                    <div class="form-group col-3">
                                        <input name="maxscore" class="form-control"id="maxscore" type="number" readonly hidden="hidden">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-3"></div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
<script src="{{asset('sms_assets/pages/scores.js')}}"></script>
@endsection
