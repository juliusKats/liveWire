@extends('SMS._layout._layout')
@section('title')
    Scores
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blank Page</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Advanced Table</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="mb-2"><a href="{{ route('add.scores') }}" class="btn btn-success float-right auto">Enter Scores</a></div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Student</th>
                                            <th>Year</th>
                                            <th>Term</th>
                                            <th>Level</th>
                                            <th>Class</th>
                                            <th>Stream</th>
                                            <th>Subject</th>
                                            <th>Exam</th>
                                            <th>Objective</th>
                                            <th>Paper</th>
                                            <th>Score</th>
                                            <th>Grade</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ( $scores as $key=> $score)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $score->student_id}}</td>
                                            <td>{{ $score->year_id}}</td>
                                            <td>{{ $score->term_id}}</td>
                                            <td>{{ $score->stdscores()->name}}</td>
                                            <td>{{ $score->class_id}}</td>
                                            <td>{{ $score->stream_id}}</td>
                                            <td>{{ $score->subject_id}}</td>
                                            <td>{{ $score->examset_id}}</td>
                                            <td>{{ $score->objective_id}}</td>
                                            <td>{{ $score->paper_id}}</td>
                                            <td>{{ $score->score}}</td>
                                            <td>{{ $score->grade_id}}</td>
                                            <td>Action</td>
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
