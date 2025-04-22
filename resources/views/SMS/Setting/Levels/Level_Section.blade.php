@extends('SMS._layout._layout')
@section('title')
    Manage Class Streeam
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manage Class and Stream</h1>
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
                        <div class="float-right m-2"><a class="btn btn-info" href="{{route('class.save')}}">ADD CLASS</a> </div>
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
                                    @foreach ( $classes as $key=> $class)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $class->name}}</td>
                                            <td>{{ $class->abbrev}}</td>
                                            <th>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route ('edit.class', $class->id) }}" class="btn btn-info">Edit</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <form method="post" action="{{ route('delete.class',$class->id) }}">
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
                        <div class="float-right m-2"><a class="btn btn-info" href="{{route('stream.save')}}">ADD STREAM</a> </div>
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
                                    @foreach ( $streams as $key=> $stream)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $stream->name}}</td>
                                            <td>{{ $stream->abbrev}}</td>
                                            <th>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="{{ route ('edit.stream', $stream->id) }}" class="btn btn-info">Edit</a>
                                                    </div>
                                                    <div class="col-6">
                                                        <form method="post" action="{{ route('delete.stream',$stream->id) }}">
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
