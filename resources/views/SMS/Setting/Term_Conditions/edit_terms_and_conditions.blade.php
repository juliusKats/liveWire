@extends('SMS._layout._layout')
@section('title')
    Terms and Conditions
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Advanced Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Advanced Forms</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Advanced Forms</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <h4>Terms and Conditions</h4>
                        <hr />
                        <div class="card-body">
                            <form method="POST" action="{{ route('terms.and.conditions.update',$term->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class" class="form-control select2">
                                        <option style="text-align: center" value="0"> ---------- Select Class
                                            ---------- </option>
                                        @foreach ($classes as $class)
                                            <option @if($term->class_id == $class->id) selected @endif value="{{ $class->id }}"> {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Terms and condions</label>
                                    <textarea name="details" class="summernote">{{ $term->conditions }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Save" class="btn btn-primary btn-outline-success btn-large">
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
