@extends('SMS._layout._layout')
@section('title')
    Manage Class Streeam
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manage Class and section</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-6 col-md-6 col-sm-6">
                    @if (session('success'))
                        <div class="alert alert-success m-1 alert-dissmisable fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="float-right m-2"><a class="btn btn-info" href="{{route('level.save')}}">ADD CLASS</a> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Short Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $levels as $key=> $level)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $level->name}}</td>
                                            <td>{{ $level->abbrev}}</td>
                                            <th>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route ('edit.class', $level->id) }}" class="btn btn-info">Edit</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <form method="post" action="{{ route('delete.level',$level->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="btn btn-danger float-right" type="submit" value="Delete">
                                                        </form>
                                                    </div>
                                                </div>

                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="float-right m-2"><a class="btn btn-info" href="{{route('section.save')}}">ADD section</a> </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Short Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $sections as $key=> $section)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $section->name}}</td>
                                            <td>{{ $section->abbrev}}</td>
                                            <th>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route ('edit.section', $section->id) }}" class="btn btn-info">Edit</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <form method="post" action="{{ route('delete.section',$section->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input class="btn btn-danger float-right" type="submit" value="Delete">
                                                        </form>
                                                    </div>
                                                </div>

                                            </th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

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
