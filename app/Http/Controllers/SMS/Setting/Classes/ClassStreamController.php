<?php

namespace App\Http\Controllers\SMS\Setting\Classes;

use App\Http\Controllers\Controller;
use App\Models\Classes as SchoolClass;
use App\Models\Streams;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Enums\Classes;

class ClassStreamController extends Controller
{
    public function index(){
        $streams = Streams::all();
        $classes=SchoolClass::all();
        return view('SMS.Setting.Classes.Class_Streams',compact('streams','classes'));
    }
    public function saveClass(){
        return view('SMS.Setting.Classes.Class');
    }
    public function saveStream(){
        return view('SMS.Setting.Classes.Stream');
    }
    public function save_class(Request $request){
        $data =$request->validate([
            'classname'=>[Rule::enum(Classes::class)],
            'classabbrev'=>'string','max:3'
        ]);
        if($request->classname == null){
            return redirect()->back()->with('error','A subject name is required. Try aganin');
        }

            $existclass =DB::table('classes')->select('name','abbrev')->where('name','=',$request->classname)->get();
            $existclassabbrev =DB::table('classes')->select('name','abbrev')->where('abbrev','=',$request->classabbrev)->where('name','=',$request->classname)->get();

            if(count($existclass)>0){
                return redirect('SMS/Student/Management/class/streams/save/Class')->with('error','A subject with the Entered name already exists. Try aganin');
            }
            elseif (count($existclassabbrev)>0){
                return redirect('SMS/Student/Management/class/streams/save/Class')->with('error','A class and Abbreviation  already exists. Try aganin');
            }
            else{
                SchoolClass::create([
                    'abbrev'=>$request->classabbrev,
                    'name'=>$request->classname
                ]);
                return redirect('SMS/Student/Management/class/streams/index')->with('success','Class has successfully been added');
            }
        }

    public function save_stream(Request $request){

        if($request->streamname === null or $request->streamname ='' ){
//            dd('error');
            return redirect()->back()->with('error','A stream name is required. Try aganin');
        }

            $data =$request->validate([
                'streamname'=>'required','unique,streams:name','max:15',
                'streamabbrev'=>'string','max:3'
            ]);
//            dd($request->all());

            $existclass =DB::table('streams')->select('name','abbrev')->where('name','=',$request->streamname)->get();
            $existclassabbrev =DB::table('streams')->select('name','abbrev')->where('abbrev','=',$request->streamabbrev)->where('name','=',$request->streamname)->get();



            if(count($existclass)>0){
                return redirect('SMS/Student/Management/class/streams/save/Stream')->with('error','A subject with the Entered name already exists. Try aganin');
            }
            elseif (count($existclassabbrev)>0){
                return redirect('SMS/Student/Management/class/streams/save/Stream')->with('error','A class and Abbreviation  already exists. Try aganin');
            }
            else{
                $stream = new Streams;
                $stream->name = $request->streamname;
                $stream->name=$request->streamname;
                $stream->save();
//                Streams::create([
//                    'abbrev'=>$request->streamabbrev,
//                    'name'=>$request->streamname
//                ]);
                return redirect('SMS/Student/Management/class/streams/index')->with('success','Class has successfully been added');
            }



    }

    public function edit_class(Request $request,$id){

    }
    public function edit_stream(Request $request, $id){

    }
    public function update_class(Request $request, $id){

    }
    public function update_stream(Request $request, $id){

    }
}
