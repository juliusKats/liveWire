<?php

namespace App\Http\Controllers\SMS\Setting\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Terms;
use App\Models\YearTerms;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\DB;
use App\Exports\UserModel;
use Excel;

class SchoolController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function exportAcademic(){
            $today=date('d-m-Y:H-i-s').' academics.pdf';
            return Excel::download(new UserModel,$today);
        }
        public function index()
        {
            $years=Year::all();
            $terms=Terms::all();
            $yrTerms=YearTerms::all();
            return view('SMS.Setting.School.index',compact('years','terms','yrTerms'));
        }
        //  ========= Year controls ============
        public function storeYear(Request $request)
        {
            $data=$request->validate([
                'year'=>'required','unique','min:4','max:4',
            ]);
            $existyear=DB::select('select * from years where year = ?', [$request->year]);
            if(count($existyear)>0)
            {
                return redirect('Years/year/index')->with('error','Year already exists');

            }
            else{
                Year::create($data);
                return redirect('Years/year/index')->with('success','Year successfully added');

            }

        }
        public function showYear(string $id)
        {
            //
        }
        public function editYear(string $id)
        {
            //
        }
        public function updateYear(Request $request, string $id)
        {
            //
        }
        public function destroyYear(string $id)
        {
            //
        }
        //  ========= Term controls ============
        public function storeTerm(Request $request)
        {
            $data=$request->validate([
                'term'=>'required','unique',
            ]);

            $existyear=DB::select('select * from terms where term = ?', [$request->term]);

            if($request->term == "Select Term")
            {
                return redirect('Years/year/index')->with('error','Select a Term from the List');

            }
            elseif(count($existyear)>0)
            {
                return redirect('Years/year/index')->with('error','Term already exists');

            }
            else{
                Terms::create($data);
                return redirect('Years/year/index')->with('success','Term successfully added');

            }
        }

        public function showTerm(string $id)
        {
            //
        }
        public function editTerm(string $id)
        {
            //
        }
        public function updateTerm(Request $request, string $id)
        {
            //
        }
        public function destroyTerm(string $id)
        {
            //
        }
         //  ========= YearTerm controls ============
         public function storeYearTerm(Request $request)
         {

            $input=$request->all();
             $data=$request->validate([
                'year'=>'required','exists:years,year',
                'terms'=>'required','exist:terms,term',
             ]);

            $p=count($request->terms);
            $m=$request->terms;
            for($i=0; $i<$p; $i++){
                AcademicYear::create([
                    'year_id'=> $request->year,
                    'term_id'=>$m[$i]
                ]);
            }
            YearTerms::create([
                'year_id'=> $request->year,
                'term_id'=>json_encode($request->terms)
            ]);

            return redirect('Years/year/index')->with('success','TAccademic Year Success Set');

         }

         public function showYearTerm(string $id)
         {
             //
         }
         public function editYearTerm(string $id)
         {
             //
         }
         public function updateYearTerm(Request $request, string $id)
         {
             //
         }
         public function destroyYearTerm(string $id)
         {
             //
         }
    }


