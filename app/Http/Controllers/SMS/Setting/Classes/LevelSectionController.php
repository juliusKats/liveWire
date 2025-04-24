<?php

namespace App\Http\Controllers\SMS\Setting\levels;

use App\Http\Controllers\Controller;
use App\Models\Levels;
use App\Models\Sections;
use Illuminate\Http\Request;

class LevelClassController extends Controller
{
    public function index(){
        $levels = Levels::all();
        $sections=Sections::all();
        return view('SMS.Setting.Levels.Level_Section',compact('sections','levels'));
    }
    public function saveLevel(){
        return view('SMS.Setting.Levels.Level');
    }
    public function saveSection(){
        return view('SMS.Setting.Levels.Sections');
    }
    public function save_level(Request $request){
        $data =$request->validate([
            'classname'=>'required|string|min:3|max:15|unique:levels,name',
            'classabbrev'=>'string|max:3'
        ]);
        $existclass =DB::table('levels')->select('name','abbrev')->where('name','=',$request->classname)->get();
        $existclassabbrev =DB::table('levels')->select('name','abbrev')->where('abbrev','=',$request->classabbrev)->where('name','=',$request->classname)->get();

        if(count($existclass)>0){
            return redirect()->route('class.save')->with('error','A subject with the Entered name already exists. Try aganin');
        }
        elseif (count($existclassabbrev)>0){
            return redirect()->route('class.save')->with('error','A class and Abbreviation  already exists. Try aganin');
        }
        else{
            Levels::create([
                'abbrev'=>$request->classabbrev,
                'name'=>$request->classname
            ]);
            return redirect()->route('class.streams.index')->with('success','Class has successfully been added');
        }
    }
    public function save_section(Request $request){

        $data =$request->validate([
            'streamname'=>'required|string|min:3|max:15|unique:streams,name',
            'streamabbrev'=>'string|min:1|max:4'
        ]);

        $existclass =DB::table('sections')->select('name','abbrev')->where('name','=',$request->streamname)->get();
        $existclassabbrev =DB::table('sections')->select('name','abbrev')->where('abbrev','=',$request->streamabbrev)->where('name','=',$request->streamname)->get();


        if(count($existclass)>0){
            return redirect()->route('stream.save')->with('error','A subject with the Entered name already exists. Try aganin');
        }
        elseif (count($existclassabbrev)>0){
            return redirect()->route('stream.save')->with('error','A class and Abbreviation  already exists. Try aganin');
        }
        else{
            Sections::create([
                'name'=>$request->streamname,
                'abbrev'=>$request->streamabbrev
            ]);
            return redirect()->route('class.streams.index')->with('success','Class has successfully been added');
        }



    }
    public function edit_level(Request $request,$id){
        $level =Levels::find($id);
        return view('SMS.Setting.Levels.edit_class',compact('level'));
    }
    public function update_level(Request $request, $id){
        $data =$request->validate([
            'classname'=>'required|string|min:3|max:15|unique:levels,name',
            'classabbrev'=>'string|max:3'
        ]);
        $level =Levels::find($id);
        $level->name = $request->classname;
        $level->abbrev = $request->classabbrev;
        $level->save();
        return redirect()->route('class.streams.index')->with('success', 'Class updated Successfully');

    }
    public function delete_level(Request $request,$id){
        $level =Levels::find($id);
        $level->forceDelete();
        return redirect()->route('class.streams.index')->with('success', 'Class deleted Successfully');
    }
    public function edit_section(Request $request, $id){
        $section =Sections::find($id);
        return view('SMS.Setting.Levels.edit_stream',compact('section'));
    }
    public function update_section(Request $request, $id){
        $data =$request->validate([
            'streamname'=>'required|string|min:3|max:15|unique:streams,name',
            'streamabbrev'=>'string|min:1'
        ]);
        $section =Sections::find($id);
        $section->name = $request->streamname;
        $section->abbrev = $request->streamabbrev;
        $section->save();
        return redirect()->route('class.streams.index')->with('success', 'Stream updated Successfully');

    }
    public function delete_section(Request $request,$id){
        $section =Sections::find($id);
        $section->delete();
        return redirect()->route('class.streams.index')->with('success', 'Stream deleted Successfully');
    }
}
