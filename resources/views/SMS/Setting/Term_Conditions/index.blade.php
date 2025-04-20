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
                        {{-- <div class="card-header"> --}}
                        <h4>Terms and Conditions</h4>
                        <hr />
                        {{-- </div> --}}
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="mb-2"><a  class="btn btn-success btn-lg" href="{{ route('terms.and.conditions.create') }}">Add</a></div>
                              <table class="table table-striped" id="table-1">
                                <thead>
                                  <tr>
                                    <th class="text-center">
                                      #
                                    </th>
                                    <th>Class</th>
                                    <th>Condition</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terms as $key=> $term)
                                    <tr>

                                        <td>{{ ++$key }}</td>
                                        <td>{{ $term->class_id}}</td>
                                        <td>{!! $term->conditions !!}</td>
                                        <td><a href="{{ route('terms.and.conditions.view',$term->id) }}" class="btn btn-secondary">Detail</a></td>
                                        <td><a href="{{ route('terms.and.conditions.edit',$term->id) }}" class="btn btn-secondary">Edit</a></td>
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
    </section>
@endsection

@section('scripts')
@endsection
