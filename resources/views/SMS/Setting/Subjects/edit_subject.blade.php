@extends('SMS._layout._layout')
@section('title')
    Edit Class
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Class</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-4 col-md-4 col-sm-4"></div>
            <div class="col-4 col-md-4 col-sm-4">

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

                 <form method="post" action="{{ route('update.class',$class->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Class Name</label>
                    <input type="text" class="form-control" name="classname" value="{{ $class->name }}">
                    @error('classname')@enderror
                </div>
                <div class="form-group">
                    <label>Short Name</label>
                    <input type="text" class="form-control" name="classabbrev" value="{{ $class->abbrev }}">
                    @error('classabbrev')@enderror
                </div>
                <div class="form-group"><br>
                    <input type="submit" value="SAVE" class="btn btn-lg btn-success">
                </div>

        </form>
            </div>
            <div class="col-4 col-md-4 col-sm-4"></div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection
