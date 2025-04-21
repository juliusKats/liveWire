<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationality;
use App\Models\StateFinal;
use App\Models\CityFinal;
use App\Models\ClassStream;
use App\Models\LevelClass;
use App\Models\Terms;

class AjaxController extends Controller
{
    public function fetchnationality(Request $request){
        $nat['nations']=Nationality::where('id',$request->country_id)->get(['id','name']);
        return response()->json($nat);

    }
    public function fetchstates(Request $request){
        $state['states']=StateFinal::where('nationality',$request->nationality)->where('type','District')->get(['id','name']);
        return response()->json($state);

    }

    public function fetchcities(Request $request){
        $city['cities']=CityFinal::where('nationality',$request->nationality)->where('type','District')->get(['id','name']);
        return response()->json($city);

    }
    public function fetchLevelClass(Request $request){
        // $class['classes']=LevelClass::where('level_id',$request->level_id)->get(['id','class_id','level_id']);
        $class['classes']= DB::table('level_classes')
        ->select('classes.name','level_classes.class_id','level_classes.level_id')
        ->join('levels', 'level_classes.level_id', '=','levels.id')
        ->join('classes', 'level_classes.class_id', '=','classes.id')
        ->where('level_classes.level_id', '=', $request->level_id)->get();
        return response()->json($class);
    }
     public function fetchClassStream(Request $request){
        // $stream['streams']=ClassStream::where('class_id',$request->class_id)->get(['id','class_id','stream_id']);
        $stream['streams']=DB::table('class_streams')
        ->select('streams.name','class_streams.stream_id','class_streams.class_id')
        ->join('streams', 'class_streams.stream_id', '=','streams.id')
        ->join('classes', 'class_streams.class_id', '=','classes.id')
        ->where('class_id','=',$request->class_id)->get();
        return response()->json($stream);

    }

    public function fetchterms(Request $request){
        $term['terms']=DB::table('academic_years')
        ->select('academic_years.term_id','terms.term')
        ->join('terms','academic_years.term_id','=','terms.id')
        ->where('academic_years.year_id','=',$request->year_id)->get();
        return response()->json($term);
    }
    public function fetchClassStudent(Request $request){
        $student['students']=DB::table('student_classes')
        ->select('student_classes.student_id','students.name')
        ->join('students','student_classes.student_id','=','students.id')
        ->where('student_classes.class_id','=',$request->class_id)
        ->where('student_classes.stream_id','=',$request->stream_id)
        ->get();
        return response()->json($student);

    }
    public function fetchstudentsubjects(Request $request){
 $subject['subjects']=DB::table('student_subjects')
    ->select('subject_levels.subject_id as subj','student_subjects.student_id', 'student_subjects.year_id', 'student_subjects.level_id', 'student_subjects.class_id', 'student_subjects.subject_id', 'student_subjects.stream_id', 'subject_level_class_streams.subject_id', 'subject_levels.code','subjects.name')
    ->join('subject_level_class_streams','student_subjects.subject_id','=','subject_level_class_streams.id')
    ->join('subject_level_classes','subject_level_class_streams.subject_id','=','subject_level_classes.id')
    ->join('subject_levels','subject_level_classes.subject_id','=','subject_levels.id')
    ->join('subjects','subject_levels.subject_id','=','subjects.id')
    ->where('student_subjects.year_id','=',$request->year_id)
    ->where('student_subjects.level_id','=',$request->level_id)
    ->where('student_subjects.class_id','=',$request->class_id)
    ->where('student_subjects.stream_id','=',$request->stream_id)
    ->where('student_subjects.student_id','=',$request->student_id)
    ->get();
    return response()->json($subject);


    }
    public function fetchSubjectPaper(Request $request){
        $paper['papers']=DB::table('subject_papers')
        ->select('subject_papers.subject_id','subject_papers.paper_id','papers.name')
        ->join('papers', 'subject_papers.paper_id', '=','papers.id')
        ->where('subject_papers.subject_id','=',$request->subject_id)
        ->get();
        return response()->json($paper);
    }

    public function fetchObjectives(Request $request){
        $objective['objectives']=DB::table('subject_objectives')
        ->select('subject_objectives.year_id', 'subject_objectives.term_id', 'subject_objectives.level_id', 'subject_objectives.class_id', 'subject_objectives.stream_id', 'subject_objectives.subject_id', 'subject_objectives.paper_id', 'subject_objectives.objective', 'subject_objectives.details') // FROM `subject_objectives` 
        ->join('subject_levels','subject_objectives.subject_id','=','subject_levels.subject_id')
        ->where('subject_objectives.year_id','=',$request->year_id)
        ->where('subject_objectives.term_id','=',$request->term_id)
        ->where('subject_objectives.level_id','=',$request->level_id)
        ->where('subject_objectives.class_id','=',$request->class_id)
        ->where('subject_objectives.stream_id','=',$request->stream_id)
        ->where('subject_objectives.paper_id','=',$request->paper_id)
                ->where('subject_objectives.subject_id','=',$request->subject_id)
        ->get();
        return response()->json($objective);
    }
}

