<?php

namespace App\Http\Controllers\SMS\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ClassLevelStream;
use App\Models\AlevelCombs;
use App\Models\Year;
use App\Models\Terms;
use App\Models\Classes;
use App\Models\Streams;
use App\Models\Students;
use App\Models\Levels;
use App\Models\StudentClass;
use App\Models\SubjectLevel;
use App\Models\SubjectObjective;
use App\Models\ExamSets;
use App\Models\SubjectPapers;
use App\Models\StudentScores;
use App\Models\Grade;

class StudentScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $years=Year::all();
        $terms=Terms::all();
        $levels=Levels::all();
        $classes=Classes::all();
        $streams=Streams::all();
        $subjects=SubjectLevel::all();
        $objectives=SubjectObjective::all();
        $examsets=ExamSets::all();
        $papers=SubjectPapers::all();
        $students=StudentClass::all();
        $scores=StudentScores::all();

        return view ('SMS/Scores.index',
        compact('scores', 'years','terms','levels','classes','streams','subjects','objectives','examsets','papers','students')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years=Year::all();
        $terms=Terms::all();
        $levels=Levels::all();
        $classes=Classes::all();
        $streams=Streams::all();
        $subjects=SubjectLevel::all();
        $objectives=SubjectObjective::all();
        $examsets=ExamSets::all();
        $papers=SubjectPapers::all();
        $students=StudentClass::all();
        $grades =Grade::all();

        return view ('SMS/Scores.addscores',
        compact('grades' ,'years','terms','levels','classes','streams','subjects','objectives','examsets','papers','students')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->year == 0 or
        $request->term == 0 or
        $request->level == 0 or
        $request->class == 0 or
        $request->stream == 0 or
        $request->student == 0 or
        $request->examset == 0 or
        $request->subject == 0 or
        $request->paper == 0 or
        $request->objective == 0 or
        $request->score == null or
        $request->grade == 0){

        }
        else{
            // dd($request->all());
            $stdscore=StudentScores::create([
            'year_id'=>$request->year,
            'term_id'=>$request->term,
            'level_id'=>$request->level,
            'class_id'=>$request->class,
            'stream_id'=>$request->stream,
            'student_id'=>$request->student,
            'subject_id'=>$request->subject,
            'paper_id'=>$request->paper,
            'objective_id'=>$request->objective,
            'examset_id'=>$request->examset,
            'score'=>$request->maxscore,
            'grade_id'=>$request->grade,
            ]);
        }
        return redirect('scores/list');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
