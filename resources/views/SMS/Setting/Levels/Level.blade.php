@extends('SMS._layout._layout')
@section('title')
    Add Class
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Adding Class</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-4 col-md-4 col-sm-4"></div>
            <div class="col-4 col-md-4 col-sm-4">
                @if (session('error'))
                    <div class="alert alert-danger m-1 alert-dissmisable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif

                 <form method="post" action="{{ route('class.streams.save_class') }}">
            @csrf
                <div class="form-group">
                    <label>Class Name</label>
                    <input type="text" class="form-control" name="classname">
                    @error('classname')@enderror
                </div>
                <div class="form-group">
                    <label>Short Name</label>
                    <input type="text" class="form-control" name="classabbrev">
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
