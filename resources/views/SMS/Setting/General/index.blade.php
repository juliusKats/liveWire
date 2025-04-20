@extends('SMS._layout._layout')
@section('title')
    Regional Setting
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
                <div class="col-md-8 col-lg-8">
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
                    <div class="card-body">
                        <div class="row">
                            <div>
                                <form class="form-horizontal" method="POST" action="{{ route('save.regions') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Region</label>
                                            <div class="col-sm-7">
                                                <input type="text" minlength="4" maxlength="50" class="form-control"
                                                    placeholder="Enter Region" name="region">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="submit" class="btn btn-success" value="Add Year">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> #</th>
                                            <th>Region</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($regions) > 0)
                                            @foreach ($regions as $region)
                                                <tr>
                                                    <td>
                                                        {{ $region->id }}
                                                    </td>
                                                    <td> {{ $region->name }}</td>
                                                    <td>
                                                        <div
                                                            @if ($region->status == 1) class="badge badge-success"
                                                @else
                                                    class="badge badge-danger" @endif>
                                                            @if ($region->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="nav-item dropdown btn btn-warning text-danger ">
                                                            <a href="#" data-toggle="dropdown"
                                                                class="nav-link has-dropdown"><span>Actions</span></a>
                                                            <ul class="dropdown-menu">
                                                                <li class="nav-item"><a href="#"
                                                                        class="nav-link">Edit</a></li>
                                                                <li class="nav-item"><a href="#"
                                                                        class="nav-link">Trash</a></li>
                                                                <li class="nav-item"><a href="#"
                                                                        class="nav-link">Restore</a></li>
                                                                <li class="nav-item"><a href="#"
                                                                        class="nav-link">Delete</a></li>
                                                            </ul>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="table-responsive">
                                <div class="row mb-2">
                                    <div class="col-12 col-md-12 col-lg-12"><button
                                            class="float-right auto btn btn-info">Export</button></diV>
                                </div>
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        data-checkbox-role="dad" class="custom-control-input"
                                                        id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>SubRegion</th>
                                            <th>Region</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($subregions) > 0)
                                            @foreach ($subregions as $subregion)
                                                <tr>
                                                    <td>
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">{{ $subregion->name }}</td>
                                                    <td>{{ $subregion->region->name }}</td>
                                                    <td>
                                                        <div
                                                            @if ($subregion->status == 1) class="badge badge-success"
                                                             @else
                                                                class="badge badge-danger" @endif>
                                                            @if ($region->status == 1)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif

                                                        </div>

                                                    </td>
                                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Assign Terms To Year</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('save.subregion') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Region</label>
                                    <select name="region" style="height:54px;" class="form-control select2"
                                        style="width: 100%; height:50px;">
                                        <option selected="selected">Select region</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Region</label>
                                    <input type="text" name="subregion" class="form-control" focus autocomplete
                                        required data-placeholder="Select a Term">
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


        </div>

        </div>
    </section>
@endsection
@section('scripts')
@endsection
