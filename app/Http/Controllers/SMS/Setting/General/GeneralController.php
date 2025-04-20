<?php

namespace App\Http\Controllers\SMS\Setting\General;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\SubRegion;
use App\Models\Region;
use App\Models\Users;
class GeneralController extends Controller
{

    //Region
    public function SubRegions(){
        $regions =Region::all(); //DB::select('select * from regions') ;
        $subregions =SubRegion::all();  //DB::table('subregions')->get();
        // dd($regions);

        return view('SMS.Setting.General.index',compact('regions','subregions'));
    }
    public function saveRegion(Request $request){
        $data=$request->validate(['region'=>'required','min:3','unique:regions,name']);
        Region::create(['name'=>$request->region]);
        return redirect('School/Management/System/settings/general/index')->with('success','Region created successfully');

    }
    public function softDeleteRegion($id){
        $region = Region::find($id);
        $region->delete();
        return redirect('School/Management/System/settings/general/index')->with('success','Region deleted successfully');

    }
    public function forceDeleteRegion($id){
        $region = Region::find($id);
        $region->forceDelete();
        return redirect('School/Management/System/settings/general/index')->with('success','Region deleted successfully');


    }

    public function restoreRegion($id){
        $region = Region::withTrashed()->find($id);
        $region->restore();
        return redirect('School/Management/System/settings/general/index')->with('success','Region restored successfully');

    }
    public function editRegion(Request $request){

    }
    public function updateRegion(Request $request){

    }

     public function saveSubRegion(Request $request){
        $data=$request->validate([
            'region'=>'required','exists:regions,name',
            'subregion'=>'required','min:3','string',
        ]);
        SubRegion::create([
            'name'=>$request->subregion,
            'region_id'=>$request->region,
        ]);
        return redirect('School/Management/System/settings/general/index')->with('success','Sub Region created successfully');


    }

     public function editSubRegion(Request $request){

    }

     public function updateSubRegion(Request $request){

    }

     public function softDeleteSubRegion(Request $request){

    }

     public function forceDeleteSubRegion(Request $request){

    }

     public function restoreSubRegion(Request $request){

    }
    // SubRegion
    // Countries
    // States
    // Cities
}
