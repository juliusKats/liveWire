@extends('SMS._layout._layout')
@section('title')
    Add Stream
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Stream</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-4 col-md-4 col-sm-4"></div>
            <div class="col-4 col-md-4 col-sm-4">
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

                 <form method="post" action="{{ route('streams.class.save_class') }}">
            @csrf
                <div class="form-group">
                    <label>Stream Name</label>
                    <input type="text" class="form-control" name="streamname">
                    @error('streamname')@enderror
                </div>
                <div class="form-group">
                    <label>Short Name</label>
                    <input type="text" class="form-control" name="streamabbrev">
                    @error('streamabbrev')@enderror
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
