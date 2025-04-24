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
                <div class="col-9 col-md-9 col-sm-9">
                    @if (session('success'))
                        <div class="alert alert-success m-1 alert-dissmisable fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Subject Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ( $subjects as $key=> $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->name}}</td>
                                            <td style="width: 5px;">
                                                <a href="{{ route ('school.subject.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            </td>
                                            <td style="width: 5px;">
                                                <form method="post" action="{{ route('school.subject.delete',$item->id) }}" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn btn-danger float-right" type="submit" value="Delete">
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3 col-md-3 col-sm-3">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger m-1 alert-dissmisable fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ __('Whoops! Something went wrong.') }}</strong>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger m-1 alert-dissmisable fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>{{ session('error') }}</strong><br>
                                <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('school.subject.save') }}">
                            @csrf
                            <div class="form-group">
                                <label>Subject Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control" name="name">
                                @error('name')@enderror
                            </div>

                            <div class="form-group"><br>
                                <input type="submit" value="SAVE" class="btn btn-lg btn-success">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection
