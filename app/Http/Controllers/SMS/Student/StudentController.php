<?php

namespace App\Http\Controllers\SMS\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Classes;
use App\Models\Country;
use App\Models\Divisions;
use App\Models\Identities;
use App\Models\Relationship;
use App\Models\Religion;
use App\Models\Sections;
use App\Models\Streams;
use App\Models\Levels;
use App\Models\ContactType;
use App\Models\ClassLevelStream;
use App\Models\AlevelCombs;
use App\Models\Terms;
use App\Models\Year;
use App\Models\Students;
use App\Models\StdAddress;
use App\Models\StdCombs;
use App\Models\StdCondition;
use App\Models\StdEmmergency;
use App\Models\PrimaryDetails;
use App\Models\UCEDetails;


class StudentController extends Controller
{
// ajax


    public function index(){
        // $students = Students::all();

        $Osubjs=  DB::table('subject_levels')
            ->select('subjects.id','name','subject_levels.code','subject_levels.isComp')
            ->join('subjects','subjects.id', '=', 'subject_levels.subject_id')
            ->where('subject_levels.level_id', '=', 1)
            ->orderBy('subject_levels.isComp','ASC')
            ->get();
        // dd($Osubjs);
        $contacts=ContactType::all();
        $religions=Religion::all();
        $divisions =Divisions::all();
        $countries=Country::all();
        $nationalities=Country::all();
        $sections =Sections::all();
        $relations=Relationship::all();
        $identities=Identities::all();
        $allcombs=AlevelCombs::all();
        $years=Year::all();
        $terms=Terms::all();
        $levels=Levels::all();
        $AStreams=ClassLevelStream::all()->where('level_id','=',2);
        $streams=Streams::all();
        $classes=Classes::all();


// dd($AStreams);
        return view('SMS.Enrollment.register',compact('AStreams','sections','classes','streams','Osubjs','divisions','identities','relations',
            'countries','nationalities','religions','contacts','allcombs','years','terms','levels'));
    }
    public function enrollment(){
        $Osubjs=  DB::table('subject_levels')
            ->select('subjects.id','name','subject_levels.code','subject_levels.isComp')
            ->join('subjects','subjects.id', '=', 'subject_levels.subject_id')
            ->where('subject_levels.level_id', '=', 1)
            ->orderBy('subject_levels.isComp','ASC')
            ->get();
        // dd($Osubjs);
        $AStreams=StreamLevel::where('level_id','2');
        $divisions =Divisions::all();
        $streams=Streams::all();
        $levels=Levels::all();
        $classes=Classes::all();
        $countries=Country::all();
        $nationalities=Country::all();
        $sections =Sections::all();
        $relations=Relationship::all();
        $identities=Identities::all();
        $years=Year::all();
        $terms=Terms::all();
        return view('SMS.Enrollment.register',
            compact('sections','classes','streams','Osubjs','divisions','identities','relations','AStreams',
                'countries','nationalities','currentStep','totalSteps','years','terms','levels'));
    }

    public function saveRegistration(Request $request){
        $data=$request->validate([
            'stdphoto' =>'nullable','file','mime:jpeg,jpg,png','max:2048',
            'stdfirst_name'=>'required','string',
            'stdmiddle_name'=>'nullable','string','max:30',
            'stdlast_name'=>'required','max:3','string',
            'stdGender'=>'required',
            'stdReligion'=>'required','exists:religions,name',
            'stdDOB' =>'required','date',
            'stdEmail'=>'nullable','email','min:10',
            'stdTel'=>'nullable','numeric','min:10',
            'alive'=>'required',

            'regYear'=>'required','exists:years,name',
            'regTerm'=>'required','exists:terms,name',
            'regLevel'=>'required','levels:sections,name',
            'stdsection'=>'required','exists:sections,name',
            'stdclass'=>'required','exists:classes,name',
            'stdstream'=>'required_if: stdclass,5,stdclass,6','exists:streams,id','not_in:Select stdStream',
            'stdcomb'=>'required','exists:alevel_combs,name',
            'livewith'=>'required',
            'medical'=>'required','integer',
            'officialComment'=>'nullable','string','max:2048',//[Text Area]

            'stdcountry'=>'required','exists:countries,name',
            'stdnationality'=>'required','exists:countries,nationality',
            'stdDistrict'=>'nullable','min:3','string',
            'stdCity'=>'nullable','min:3','string',
            'stdCounty'=>'nullable','min:3','string',
            'stdSubcounty'=>'nullable','min:3','string',
            'stdProvince'=>'nullable','min:3','string',
            'stdParish'=>'nullable','min:3','string',
            'stdAddress'=>'nullable','min:20','string',

            'emFname'=>'required','min:3','string',
            'emLname'=>'required','min:3','string',
            'emMname'=>'nullable','string','min:3',
            'emRelation'=>'required','string','exists:relationships,name',
            'emType'=>'required','string','exists:contact_types,name',
            'emMobile'=>'required','min:10','numeric',
            'emTel'=>'nullable','min:10','numeric',
            'emMail'=>'nullable','email','max:30',
            'emAddress'=>'nullable','string:max:2048',//  [Text Area]
            'emphoto' =>'nullable','file','mime:jpeg,jpg,png','max:2048',//[files]

            //         // ----ple----
            'pleSchool'=>'required_if:stdclass,1','nullable','min:3','string',
            'pleYear'=>'required_if:stdclass,1','nullable','max:4','numeric',
            'pleIndex'=>'required_if:stdclass,1','nullable','min:6','string',
            'pleEng'=>'required_if:stdclass,1','nullable','max:1','numeric',
            'pleMath'=>'required_if:stdclass,1','nullable','max:1','numeric',
            'pleScience'=>'required_if:stdclass,1','nullable','max:1','numeric',
            'pleSST'=>'required_if:stdclass,1','nullable','max:1','numeric',
            'pleAggs'=>'required_if:stdclass,1','nullable','max:2','numeric',
            'pleDivision'=>'required_if:stdclass,1','nullable','exists:divisions,name',

            //     // --- uce ---
            'uceSchool'=>'required_if:stdclass,5','nullable','min:3','string',
            'uceYear'=>'required_if:stdclass,5','nullable','numeric','max:4',
            'uceIndex'=>'required_if:stdclass,5','nullable','min:7','string',
            'uceAgg'=>'required_if:stdclass,5','nullable','numeric','max:2',
            'uceDivision'=>'required_if:stdclass,5','nullable','exists:divisions,name',
            'uceSubjects'=>'required_if:stdclass,5','nullable','array','min:3',
            'uceSubjects.*'=>'required_if:stdclass,5','nullable','array','min:3','distinct',
            'OlSelected'=>'required_if:stdclass,5','nullable','array','min:3',
            'OlSelected.*'=>'required_if:stdclass,5','nullable','array','min:3','distinct',

            'medicalName'=>'required_if:medical,1','nullable','min:5','string',
            'medicalDescription' =>'required_if:medical,1','nullable','string','min:20',

            'agree'=>'nullable',
        ]);

        if($request->livewith =='both'){
            $request->validate([
                'ffname'=>'required','string','min:3',
                'fmname'=>'nullable','string','min:3',
                'flname'=>'required','string','min:3',
                'femail'=>'nullable','email','min:3',
                'fmobile'=>'required','numeric','min:10',
                'ftel'=>'nullable','numeric','min:10',
                'fidtype'=>'required','exists:identities,name',
                'fidno'=>'required','string','min:3',
                'fcountry'=>'required','exists:countries,name',
                'fnationality'=>'required','exists:countries,nationality',
                'fprovince'=>'nullable','string','min:3',
                'fdistrict'=>'nullable','string','min:3',
                'fcity'=>'nullable','string','min:3',
                'fcounty'=>'nullable','string','min:3',
                'fsubcounty'=>'nullable','string','min:3',
                'fparish'=>'nullable','string','min:3',
                'faddress'=>'nullable','string','min:30',
                'fphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',

                'mfname'=>'required','string','min:3',
                'mmname'=>'nullable','string','min:3',
                'mlname'=>'required','string','min:3',
                'memail'=>'nullable','email','min:3',
                'mmobile'=>'required','numeric','min:10',
                'mtel'=>'nullable','numeric','min:10',
                'midtype'=>'required','exists:identities,name',
                'midno'=>'required','string','min:3',
                'mcountry'=>'required','exists:countries,name',
                'mnationality'=>'required','exists:countries,nationality',
                'mprovince'=>'nullable','string','min:3',
                'mdistrict'=>'nullable','string','min:3',
                'mcity'=>'nullable','string','min:3',
                'mcounty'=>'nullable','string','min:3',
                'msubcounty'=>'nullable','string','min:3',
                'mparish'=>'nullable','string','min:3',
                'maddress'=>'nullable','string','min:30',
                'mphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',
            ]);
        }

        elseif($request->livewith =='father'){
             $request->validate([
                'ffname'=>'required','string','min:3',
                'fmname'=>'nullable','string','min:3',
                'flname'=>'required','string','min:3',
                'femail'=>'nullable','email','min:3',
                'fmobile'=>'required','numeric','min:10',
                'ftel'=>'nullable','numeric','min:10',
                'fidtype'=>'required','exists:identities,name',
                'fidno'=>'required','string','min:3',
                'fcountry'=>'required','exists:countries,name',
                'fnationality'=>'required','exists:countries,nationality',
                'fprovince'=>'nullable','string','min:3',
                'fdistrict'=>'nullable','string','min:3',
                'fcity'=>'nullable','string','min:3',
                'fcounty'=>'nullable','string','min:3',
                'fsubcounty'=>'nullable','string','min:3',
                'fparish'=>'nullable','string','min:3',
                'faddress'=>'nullable','string','min:30',
                'fphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',
            ]);

        }

        elseif($request->livewith =='mother'){
            $request->validate([
                'mfname'=>'required','string','min:3',
                'mmname'=>'nullable','string','min:3',
                'mlname'=>'required','string','min:3',
                'memail'=>'nullable','email','min:3',
                'mmobile'=>'required','numeric','min:10',
                'mtel'=>'nullable','numeric','min:10',
                'midtype'=>'required','exists:identities,name',
                'midno'=>'required','string','min:3',
                'mcountry'=>'required','exists:countries,name',
                'mnationality'=>'required','exists:countries,nationality',
                'mprovince'=>'nullable','string','min:3',
                'mdistrict'=>'nullable','string','min:3',
                'mcity'=>'nullable','string','min:3',
                'mcounty'=>'nullable','string','min:3',
                'msubcounty'=>'nullable','string','min:3',
                'mparish'=>'nullable','string','min:3',
                'maddress'=>'nullable','string','min:30',
                'mphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',
            ]);
        }
        elseif($request->livewith =='other'){
            $request->validate([
                'gfname'=>'required','string','min:3',
                'gmname'=>'nullable','string','min:3',
                'glname'=>'required','string','min:3',
                'gemail'=>'nullable','email','min:3',
                'gmobile'=>'required','numeric','min:10',
                'gtel'=>'nullable','numeric','min:10',
                'grelation'=>'required','string','exists:relationships,name',
                'gidtype'=>'required','exists:identities,name',
                'gidno'=>'required','string','min:3',
                'gcountry'=>'required','exists:countries,name',
                'gnationality'=>'required','exists:countries,nationality',
                'gprovince'=>'nullable','string','min:3',
                'gdistrict'=>'nullable','string','min:3',
                'gcity'=>'nullable','string','min:3',
                'gcounty'=>'nullable','string','min:3',
                'gsubcounty'=>'nullable','string','min:3',
                'gparish'=>'nullable','string','min:3',
                'gaddress'=>'nullable','string','min:30',
                'gphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',
            ]);
        }
        else{
            $request->validate([
                'ffname'=>'nullable','string','min:3',
                'fmname'=>'nullable','string','min:3',
                'flname'=>'nullable','string','min:3',
                'femail'=>'nullable','email','min:3',
                'fmobile'=>'nullable','numeric','min:10',
                'ftel'=>'nullable','numeric','min:10',
                'fidtype'=>'nullable','exists:identities,name',
                'fidno'=>'nullable','string','min:3',
                'fcountry'=>'nullable','exists:countries,name',
                'fnationality'=>'nullable','exists:countries,nationality',
                'fprovince'=>'nullable','string','min:3',
                'fdistrict'=>'nullable','string','min:3',
                'fcity'=>'nullable','string','min:3',
                'fcounty'=>'nullable','string','min:3',
                'fsubcounty'=>'nullable','string','min:3',
                'fparish'=>'nullable','string','min:3',
                'faddress'=>'nullable','string','min:30',
                'fphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',

                'mfname'=>'nullable','string','min:3',
                'mmname'=>'nullable','string','min:3',
                'mlname'=>'nullable','string','min:3',
                'memail'=>'nullable','email','min:3',
                'mmobile'=>'nullable','numeric','min:10',
                'mtel'=>'nullable','numeric','min:10',
                'midtype'=>'nullable','exists:identities,name',
                'midno'=>'nullable','string','min:3',
                'mcountry'=>'nullable','exists:countries,name',
                'mnationality'=>'nullable','exists:countries,nationality',
                'mprovince'=>'nullable','string','min:3',
                'mdistrict'=>'nullable','string','min:3',
                'mcity'=>'nullable','string','min:3',
                'mcounty'=>'nullable','string','min:3',
                'msubcounty'=>'nullable','string','min:3',
                'mparish'=>'nullable','string','min:3',
                'maddress'=>'nullable','string','min:30',
                'mphoto'=>'nullable','mime:jpeg,jpg,png','max:2048',

                'gFname'=>'nullable','string','min:3',
                'gMname'=>'nullable','string','min:3',
                'gLName'=>'nullable','string','min:3',
                'gEmail'=>'nullable','email','min:3',
                'gMobile'=>'nullable','numeric','min:10',
                'gTel'=>'nullable','numeric','min:10',
                'gRelation'=>'nullable','string','exists:relationships,name',
                'gIDType'=>'nullable','exists:identities,name',
                'gIDNo'=>'nullable','string','min:3',
                'gCountry'=>'nullable','exists:countries,name',
                'gNationality'=>'nullable','exists:countries,nationality',
                'gProvince'=>'nullable','string','min:3',
                'gDistrict'=>'nullable','string','min:3',
                'gCity'=>'nullable','string','min:3',
                'gCounty'=>'nullable','string','min:3',
                'gSubcounty'=>'nullable','string','min:3',
                'gParish'=>'nullable','string','min:3',
                'gAddress'=>'nullable','string','min:30',
                'gPhoto'=>'nullable','mime:jpeg,jpg,png','max:2048',
            ]);
        }

// creat student
        if($request->stdstream == 0){
            $student=Students::create([
                'name'=>$request->stdfirst_name . ' ' . $request->stdmiddle_name . ' ' . $request->stdlast_name,
                'email'=>$request->stdEmail,
                'dob'=>$request->stdDOB,
                'bothparents'=>$request->alive,
                'livingwith'=>$request->livewith,
                'stdGender'=>$request->stdGender,
                'telephone'=>$request->stdTel,
                'stdPhoto'=>$request->stdphoto,
                'level_id'=>$request->regLevel,
                'section_id'=>$request->stdsection,
                'year_id'=>$request->regYear,
                'class_id'=>$request->stdclass,
                'religion_id'=>$request->stdReligion,
                'term_id'=>$request->regTerm,
                'condition'=>$request->medical,
                'official_comments'=>$request->officialComment
            ]);
        }
        else{
            $student=Students::create([
                'name'=>$request->stdfirst_name . ' ' . $request->stdmiddle_name . ' ' . $request->stdlast_name,
                'email'=>$request->stdEmail,
                'dob'=>$request->stdDOB,
                'bothparents'=>$request->alive,
                'livingwith'=>$request->livewith,
                'stdGender'=>$request->stdGender,
                'telephone'=>$request->stdTel,
                'stdPhoto'=>$request->stdphoto,
                'level_id'=>$request->regLevel,
                'section_id'=>$request->stdsection,
                'year_id'=>$request->regYear,
                'class_id'=>$request->stdclass,
                'stream_id'=>$request->stdstream,
                'religion_id'=>$request->stdReligion,
                'term_id'=>$request->regTerm,
                'condition'=>$request->medical,
                'official_comments'=>$request->officialComment
            ]);
        }
// creat student Address
        if($student){
            $stdadress=StdAddress::create([
                'student_id'=>$student->id,
                'country_id'=>$request->stdcountry,
                'nationality_id'=>$request->stdnationality,
                'district'=>$request->stdDistrict,
                'city'=>$request->stdCity,
                'province'=>$request->stdProvince,
                'county'=>$request->stdCounty,
                'subcounty'=>$request->stdSubcounty,
                'parish'=>$request->stdParish,
                'address'=>$request->stdAddress,
            ]);
        }
// creat student Emmergency
        if($request->emMname != null and $student){
            $stdEmmergency=StdEmmergency::create([
                'student_id'=>$student->id,
                'relation_id'=>$request->emRelation,
                'emmName'=>$request->emFname . '' . $request->emMname . '' . $request->emLname,
                'emmTelephone'=>$request->emTel,
                'emmMobile'=>$request->emMobile,
                'emmPhoto'=>$request->emphoto,
                'emmMail'=>$request->emMail,
                'emmType_id'=>$request->emType,
                'emAddress'=>$request->emAddress,
            ]);
        }
        else{
            $stdEmmergency=StdEmmergency::create([
                'student_id'=>$student->id,
                'relation_id'=>$request->emRelation,
                'emmName'=>$request->emFname . '' . $request->emLname,
                'emmTelephone'=>$request->emTel,
                'emmMobile'=>$request->emMobile,
                'emmPhoto'=>$request->emphoto,
                'emmMail'=>$request->emMail,
                'emmType_id'=>$request->emType,
                'emAddress'=>$request->emAddress,
            ]);
        }
// creat student combination
        if($request->stdclass>4 and $student){
            $stdcombs=StdCombs::create([
                'student_id'=>$student->id,
                'combination_id'=>$request->stdcomb,
                'class_id'=>$student->class_id,
                'stream_id'=>$student->stream_id
            ]);
        }
// creat student ple
        if($request->stdclass==1 and $student){
            $stdPLE=PrimaryDetails::create([
                'student_id'=>$student->id,
                'SchName'=>$request->pleSchool,
                'StdIndex'=>$request->pleIndex,
                'PLEYear'=>$request->pleYear,
                'Eng'=>$request->pleEng,
                'Maths'=>$request->pleMath,
                'SST'=>$request->pleSST,
                'Scie'=>$request->pleScience,
                'Aggs'=>$request->pleAggs,
                'DIV'=>$request->pleDivision
            ]);
        }
// creat student uce
        if($request->stdclass==5 and $student){
            $stdUCE=UCEDetails::create([
                'student_id'=>$student->id,
                'SchName'=>$request->uceSchool,
                'StdIndex'=>$request->uceIndex,
                'PLEYear'=>$request->uceYear,
                'Aggs'=>$request->uceAggs,
                'DIV'=>$request->uceDivision,
                'subj'=>json_encode($request->uceSubjects),
                'subjGrades'=>json_encode($request->OlSelected),
            ]);
        }

    //     if($request->livewith=="both" and $student){
    //         if($request->fMName != null){
    //             $stdBoth=fs::create([
    //             'student_id'=>$request->student->id,
    //             'name'=>$request->fFname . '' . $request->fMName . '' . $request->fLName,
    //             'email'=>$request->fEmail,
    //             'mobile'=>$request->fMobile,
    //             'telephone'=>$request->fTel,
    //             'idnumber'=>$request->fIDNo,
    //             'district'=>$request->fDistrict,
    //             'city'=>$request->fCity,
    //             'province'=>$request->fProvince,
    //             'county'=>$request->fCounty,
    //             'subcounty'=>$request->fSubcounty,
    //             'address'=>$request->fAddress,
    //             'parish' =>$request->fParish,
    //             'idType_id'=>$request->fIDType,
    //             'nationality_id'=>$request->fNationality,
    //             'country_id'=>$request->fCountry,
    //             'avatar'=>$request->fPhoto
    //             ]);

    //         }
    //         else{
    //             $stdBoth=fs::create([
    //                 'student_id'=>$request->student->id,
    //                 'name'=>$request->fFname . '' . $request->fLName,
    //                 'email'=>$request->fEmail,
    //                 'mobile'=>$request->fMobile,
    //                 'telephone'=>$request->fTel,
    //                 'idnumber'=>$request->fIDNo,
    //                 'district'=>$request->fDistrict,
    //                 'city'=>$request->fCity,
    //                 'province'=>$request->fProvince,
    //                 'county'=>$request->fCounty,
    //                 'subcounty'=>$request->fSubcounty,
    //                 'address'=>$request->fAddress,
    //                 'parish' =>$request->fParish,
    //                 'idType_id'=>$request->fIDType,
    //                 'nationality_id'=>$request->fNationality,
    //                 'country_id'=>$request->fCountry,
    //                 'avatar'=>$request->fPhoto
    //             ]);
    //         }

    //         if($request->MotherMName != null){
    //             $stdBoth=Mothers::create([
    //             'student_id'=>$request->student->id,
    //             'name'=>$request->MotherFname . '' . $request->MotherMName . '' . $request->MotherLName,
    //             'email'=>$request->MotherEmail,
    //             'mobile'=>$request->MotherMobile,
    //             'telephone'=>$request->MotherTel,
    //             'idnumber'=>$request->MotherIDNo,
    //             'district'=>$request->MotherDistrict,
    //             'city'=>$request->MotherCity,
    //             'province'=>$request->MotherProvince,
    //             'county'=>$request->MotherCounty,
    //             'subcounty'=>$request->MotherSubcounty,
    //             'address'=>$request->MotherAddress,
    //             'parish' =>$request->MotherParish,
    //             'idType_id'=>$request->MotherIDType,
    //             'nationality_id'=>$request->MotherNationality,
    //             'country_id'=>$request->MotherCountry,
    //             'avatar'=>$request->MotherPhoto
    //             ]);

    //         }
    //         else{
    //             $stdBoth=Mothers::create([
    //                 'student_id'=>$request->student->id,
    //                 'name'=>$request->MotherFname . '' . $request->MotherLName,
    //                 'email'=>$request->MotherEmail,
    //                 'mobile'=>$request->MotherMobile,
    //                 'telephone'=>$request->MotherTel,
    //                 'idnumber'=>$request->MotherIDNo,
    //                 'district'=>$request->MotherDistrict,
    //                 'city'=>$request->MotherCity,
    //                 'province'=>$request->MotherProvince,
    //                 'county'=>$request->MotherCounty,
    //                 'subcounty'=>$request->MotherSubcounty,
    //                 'address'=>$request->MotherAddress,
    //                 'parish' =>$request->MotherParish,
    //                 'idType_id'=>$request->MotherIDType,
    //                 'nationality_id'=>$request->MotherNationality,
    //                 'country_id'=>$request->MotherCountry,
    //                 'avatar'=>$request->MotherPhoto
    //             ]);
    //         }
    //     }
    //     if($request->livewith=="father" and $student){
    //         if($request->fMName != null){
    //             $stdBoth=fs::create([
    //             'student_id'=>$request->student->id,
    //             'name'=>$request->fFname . '' . $request->fMName . '' . $request->fLName,
    //             'email'=>$request->fEmail,
    //             'mobile'=>$request->fMobile,
    //             'telephone'=>$request->fTel,
    //             'idnumber'=>$request->fIDNo,
    //             'district'=>$request->fDistrict,
    //             'city'=>$request->fCity,
    //             'province'=>$request->fProvince,
    //             'county'=>$request->fCounty,
    //             'subcounty'=>$request->fSubcounty,
    //             'address'=>$request->fAddress,
    //             'parish' =>$request->fParish,
    //             'idType_id'=>$request->fIDType,
    //             'nationality_id'=>$request->fNationality,
    //             'country_id'=>$request->fCountry,
    //             'avatar'=>$request->fPhoto
    //             ]);

    //         }
    //         else{
    //             $stdBoth=fs::create([
    //                 'student_id'=>$request->student->id,
    //                 'name'=>$request->fFname . '' . $request->fLName,
    //                 'email'=>$request->fEmail,
    //                 'mobile'=>$request->fMobile,
    //                 'telephone'=>$request->fTel,
    //                 'idnumber'=>$request->fIDNo,
    //                 'district'=>$request->fDistrict,
    //                 'city'=>$request->fCity,
    //                 'province'=>$request->fProvince,
    //                 'county'=>$request->fCounty,
    //                 'subcounty'=>$request->fSubcounty,
    //                 'address'=>$request->fAddress,
    //                 'parish' =>$request->fParish,
    //                 'idType_id'=>$request->fIDType,
    //                 'nationality_id'=>$request->fNationality,
    //                 'country_id'=>$request->fCountry,
    //                 'avatar'=>$request->fPhoto
    //             ]);
    //         }
    //     }
    //     if($request->livewith=="mother" and $student){
    //         if($request->MotherMName != null){
    //             $stdBoth=Mothers::create([
    //             'student_id'=>$request->student->id,
    //             'name'=>$request->MotherFname . '' . $request->MotherMName . '' . $request->MotherLName,
    //             'email'=>$request->MotherEmail,
    //             'mobile'=>$request->MotherMobile,
    //             'telephone'=>$request->MotherTel,
    //             'idnumber'=>$request->MotherIDNo,
    //             'district'=>$request->MotherDistrict,
    //             'city'=>$request->MotherCity,
    //             'province'=>$request->MotherProvince,
    //             'county'=>$request->MotherCounty,
    //             'subcounty'=>$request->MotherSubcounty,
    //             'address'=>$request->MotherAddress,
    //             'parish' =>$request->MotherParish,
    //             'idType_id'=>$request->MotherIDType,
    //             'nationality_id'=>$request->MotherNationality,
    //             'country_id'=>$request->MotherCountry,
    //             'avatar'=>$request->MotherPhoto
    //             ]);

    //         }
    //         else{
    //             $stdBoth=Mothers::create([
    //                 'student_id'=>$request->student->id,
    //                 'name'=>$request->MotherFname . '' . $request->MotherLName,
    //                 'email'=>$request->MotherEmail,
    //                 'mobile'=>$request->MotherMobile,
    //                 'telephone'=>$request->MotherTel,
    //                 'idnumber'=>$request->MotherIDNo,
    //                 'district'=>$request->MotherDistrict,
    //                 'city'=>$request->MotherCity,
    //                 'province'=>$request->MotherProvince,
    //                 'county'=>$request->MotherCounty,
    //                 'subcounty'=>$request->MotherSubcounty,
    //                 'address'=>$request->MotherAddress,
    //                 'parish' =>$request->MotherParish,
    //                 'idType_id'=>$request->MotherIDType,
    //                 'nationality_id'=>$request->MotherNationality,
    //                 'country_id'=>$request->MotherCountry,
    //                 'avatar'=>$request->MotherPhoto
    //             ]);
    //         }
    //     }
    //     if($request->livewith=="other" and $student){
    //         if($request->MotherMName != null){
    //             $stdGuard=Guardian::create([
    //             'student_id'=>$request->student->id,
    //             'name'=>$request->GuardFname . '' . $request->GuardMName . '' . $request->GuardLName,
    //             'email'=>$request->GuardEmail,
    //             'mobile'=>$request->GuardMobile,
    //             'telephone'=>$request->GuardTel,
    //             'idnumber'=>$request->GuardIDNo,
    //             'district'=>$request->GuardDistrict,
    //             'city'=>$request->GuardCity,
    //             'province'=>$request->GuardProvince,
    //             'county'=>$request->GuardCounty,
    //             'subcounty'=>$request->GuardSubcounty,
    //             'address'=>$request->GuardAddress,
    //             'parish' =>$request->GuardParish,
    //             'idType_id'=>$request->GuardIDType,
    //             'nationality_id'=>$request->GuardNationality,
    //             'country_id'=>$request->GuardCountry,
    //             'avatar'=>$request->GuardPhoto,
    //             'relation_id'=>$request->GuardRelation,
    //             ]);

    //         }
    //         else{
    //             $stdGuard=Guardian::create([
    //                 'student_id'=>$request->student->id,
    //                 'name'=>$request->GuardFname . '' . $request->GuardLName,
    //                 'email'=>$request->GuardEmail,
    //                 'mobile'=>$request->GuardMobile,
    //                 'telephone'=>$request->GuardTel,
    //                 'idnumber'=>$request->GuardIDNo,
    //                 'district'=>$request->GuardDistrict,
    //                 'city'=>$request->GuardCity,
    //                 'province'=>$request->GuardProvince,
    //                 'county'=>$request->GuardCounty,
    //                 'subcounty'=>$request->GuardSubcounty,
    //                 'address'=>$request->GuardAddress,
    //                 'parish' =>$request->GuardParish,
    //                 'idType_id'=>$request->GuardIDType,
    //                 'nationality_id'=>$request->GuardNationality,
    //                 'country_id'=>$request->GuardCountry,
    //                 'avatar'=>$request->GuardPhoto,
    //                 'relation_id'=>$request->GuardRelation,
    //                 ]);
    //         }

    //     }

    //    if( $request->medical == 1 and $student){
    //     $stdMedical =StdCondition::create([
    //         'student_id'=>$student->id,
    //         'condition'=>$request->medicalName,
    //         'details'=>$request->medicalDescription,
    //         ]
    //     );
    //    }

    }

    public function StdBioData(){
        $countries=Country::all();
        return view('SMS.Student.Register.stdBiodata',
            compact('countries')
        );
    }
    public function store(Request $request){
         // $input=$request->all();
        $data=$request->validate([
            'stdphoto' =>'file','mime:jpeg,jpg,png','max:2048',// [files]
            'stdfrist_name'=>'required','min:3','string',
            'stdmiddle_name'=>'string','min:3',
            // 'stdlast_name'=>'string','required','min:3','max:15',
            'stdGender'=>'required',
            'stdDOB' =>'required',
        ]);
        dd($data);
    }
    public function StdHomeData(){
        return view('SMS.Student.Register.stdHome',
            compact()
        );
    }
    public function SaveStdHomeData(Request $request, $id){
        dd('Home Data');
    }
    public function StdEmmergencyData(){
        return view('SMS.Student.Register.stdEmmergency',
            compact()
        );
    }
    public function SaveStdEmmergencyData(Request $request, $id){
        dd('Emmergency Data');
    }
    public function StdApplicationData(){
        return view('SMS.Student.Register.stdApplicationClass',
        compact()
    );
    }
    public function SaveStdApplicationData(Request $request, $id){
        dd('Application Data');
    }
    public function StdParentsData(){
        return view('SMS.Student.Register.stdParentInfo',
        compact()
    );
    }
    public function SaveStdParentData(Request $request, $id){
        dd('PArent Data');
    }
    public function StdMedicalData(){
        return view('SMS.Student.Register.stdMedicalInfo',
        compact());

    }
    public function SaveStdMedicalData(Request $request, $id){
        dd('Medical Data');
    }
    public function StdTermsData(){
        return view('SMS.Student.Register.stdTandC',
        compact());
    }
    public function SaveStdTermsData(Request $request, $id){
        dd('Conditions Data');
    }
    public function StdOfficialData(){
        return view('SMS.Student.Register.stdMedicalInfo',
        compact());

    }
    public function SaveStdOfficialData(Request $request, $id){
        dd('Official Data');
    }





}
