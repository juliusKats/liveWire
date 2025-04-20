@extends('SMS._layout._layout')
@section('title')
    Academic Managemnt
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
                <div class="col-md-9 col-lg-9">
                    @if (session('success'))
                        <div class="alert alert-success m-1 alert-dissmisable fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger m-1 alert-dissmisable fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif

                    <div class="card">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <form class="form-horizontal" method="POST" action="{{ route('store.year') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Year</label>
                                                <div class="col-sm-7">
                                                    <input type="number" minlength="4" maxlength="4" min="1900"
                                                        class="form-control" placeholder="Year" placeholder="Year"
                                                        name="year">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" class="btn btn-success" value="Add Year">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-6 col-md-6">
                                    <form class="form-horizontal" method="POST" action="{{ route('store.term') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                    <select name="term" style="height:54px;" class="form-control select2"
                                                        style="width: 100%; height:50px;">
                                                        <option selected="selected">Select Term</option>
                                                        <option value="Term One">Term One</option>
                                                        <option value="Term Two">Term Two</option>
                                                        <option value="Term Three">Term Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="submit" class="btn btn-success" value="Add Term">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div> <a class="btn btn-info mb-1 float-right auto" href="{{ route('export.excel.academicdetails') }}">Export</a></div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Year</th>
                                        <th>Term</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($yrTerms) > 0)
                                        @foreach ($yrTerms as $yrTm )
                                        <tr>
                                            <td>{{  $yrTm->id}}</td>
                                            <td>{{  $yrTm->year_id}}</td>
                                            <td>
                                                @php
                                                   $termx = json_decode($yrTm->term_id)
                                                @endphp
                                                @foreach ($termx as $termY )
                                                    <a href="#" class="btn btn-success m-1">{{ $termY}}<a>
                                                @endforeach
                                                {{-- {{ $yrTm->term_id }} --}}
                                            </td>
                                            <td>Actions</td>
                                        </tr>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Assign Terms To Year</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('store.year.term') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Year</label>
                                    <select name="year" style="height:54px;" class="form-control select2"
                                        style="width: 100%; height:50px;">
                                        <option selected="selected">Select Year</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Terms</label>
                                    <select name="terms[]" class="select2" multiple="multiple"
                                        data-placeholder="Select a Term" style="width: 100%;">
                                        @foreach ($terms as $term)
                                            <option value="{{ $term->id }}">{{ $term->term }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                {{-- </div> --}}
                                <!-- /.card-body -->

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
