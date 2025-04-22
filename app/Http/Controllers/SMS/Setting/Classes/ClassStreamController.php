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
            'classname'=>'required|string|min:3|max:15|unique:classes,name',
            'classabbrev'=>'string|max:3'
        ]);


            $existclass =DB::table('classes')->select('name','abbrev')->where('name','=',$request->classname)->get();
            $existclassabbrev =DB::table('classes')->select('name','abbrev')->where('abbrev','=',$request->classabbrev)->where('name','=',$request->classname)->get();

            if(count($existclass)>0){
                return redirect()->route('class.save')->with('error','A subject with the Entered name already exists. Try aganin');
            }
            elseif (count($existclassabbrev)>0){
                return redirect()->route('class.save')->with('error','A class and Abbreviation  already exists. Try aganin');
            }
            else{
                SchoolClass::create([
                    'abbrev'=>$request->classabbrev,
                    'name'=>$request->classname
                ]);
                return redirect()->route('class.streams.index')->with('success','Class has successfully been added');
            }
        }

    public function save_stream(Request $request){

            $data =$request->validate([
                'streamname'=>'required|string|min:3|max:15|unique:streams,name',
                'streamabbrev'=>'string|min:1|max:4'
            ]);

            $existclass =DB::table('streams')->select('name','abbrev')->where('name','=',$request->streamname)->get();
            $existclassabbrev =DB::table('streams')->select('name','abbrev')->where('abbrev','=',$request->streamabbrev)->where('name','=',$request->streamname)->get();


            if(count($existclass)>0){
                return redirect()->route('stream.save')->with('error','A subject with the Entered name already exists. Try aganin');
            }
            elseif (count($existclassabbrev)>0){
                return redirect()->route('stream.save')->with('error','A class and Abbreviation  already exists. Try aganin');
            }
            else{
               Streams::create([
                'name'=>$request->streamname,
                'abbrev'=>$request->streamabbrev
               ]);
                return redirect()->route('class.streams.index')->with('success','Class has successfully been added');
            }



    }

    public function edit_class(Request $request,$id){
            $class =SchoolClass::find($id);
        return view('SMS.Setting.Classes.edit_class',compact('class'));
    }
    public function update_class(Request $request, $id){
        $data =$request->validate([
            'classname'=>'required|string|min:3|max:15|unique:classes,name',
            'classabbrev'=>'string|max:3'
        ]);
        $class =SchoolClass::find($id);
        $class->name = $request->classname;
        $class->abbrev = $request->classabbrev;
        $class->save();
        return redirect()->route('class.streams.index')->with('success', 'Class updated Successfully');

    }
    public function delete_class(Request $request,$id){
        $class =SchoolClass::find($id);
        $class->forceDelete();
        return redirect()->route('class.streams.index')->with('success', 'Class deleted Successfully');
    }
    public function edit_stream(Request $request, $id){
        $stream =Streams::find($id);
        return view('SMS.Setting.Classes.edit_stream',compact('stream'));
    }

    public function update_stream(Request $request, $id){
        $data =$request->validate([
            'streamname'=>'required|string|min:3|max:15|unique:streams,name',
            'streamabbrev'=>'string|min:1'
        ]);
        $stream =Streams::find($id);
        $stream->name = $request->streamname;
        $stream->abbrev = $request->streamabbrev;
        $stream->save();
        return redirect()->route('class.streams.index')->with('success', 'Stream updated Successfully');

    }
    public function delete_stream(Request $request,$id){
        $stream =Streams::find($id);
        $stream->delete();
        return redirect()->route('class.streams.index')->with('success', 'Stream deleted Successfully');
    }
}
