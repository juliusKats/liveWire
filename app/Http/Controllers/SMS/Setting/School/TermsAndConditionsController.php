<?php
namespace App\Http\Controllers\SMS\Setting\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\TermsAndConditions as TCS;

class TermsAndConditionsController extends Controller
{
    public function index(){
        $terms = TCS::all();
        return view('SMS.Setting.Term_Conditions.index',compact('terms'));
    }
    public function createConditions(){
        $classes=Classes::all();
        return view('SMS.Setting.Term_Conditions.create_terms_and_conditions',compact('classes'));
    }
    public function saveConditions(Request $request){
        $request->validate([
            'class'=>'required','exists:classes,name',
            'details'=>'required','text'
            ]);
            $desc=$request->details;
            $dom = new \DomDocument();
            $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile=$dom->getElementsByTagName('imageFile');
            foreach($imageFile as $item => $image){
                $data=$img->getAttribute('src');
                list($type,$data) = explode(';',$data);
                list(,$data) = explode(',',$data);
                $imgeData = base64_decode($data);
                $image_name="/upload/" . time().$item.'.png';
                $path=public_path() . $image_name;
                file_put_content($path,$imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);

            }
            $desc=$dom->saveHTML();

            $terms = new TCS;
            $terms->class_id=$request->class;
            $terms->conditions=$desc;
            $terms->save();

            return redirect('School/Management/System/terms/conditons/index')->with('success','terms and condition successfully added');

    }
    public function viewConditions($id){
        $term=TCS::find($id);
        return view('SMS.Setting.Term_Conditions.view_terms_and_conditions',compact('term'));
    }
    public function editConditions($id){
        $term=TCS::find($id);
        $classes=Classes::all();
        return view('SMS.Setting.Term_Conditions.edit_terms_and_conditions',compact('term','classes'));
    }

    public function updateConditions(Request $request,$id){
        $request->validate([
            'class'=>'required','exists:classes,name',
            'details'=>'required','text'
            ]);
            $desc=$request->details;
            $dom = new \DomDocument();
            $dom->loadHTML($request->details,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $imageFile=$dom->getElementsByTagName('imageFile');
            foreach($imageFile as $item => $image){
                $data=$img->getAttribute('src');
                list($type,$data) = explode(';',$data);
                list(,$data) = explode(',',$data);
                $imgeData = base64_decode($data);
                $image_name="/upload/" . time().$item.'.png';
                $path=public_path() . $image_name;
                file_put_content($path,$imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);

            }
            $desc=$dom->saveHTML();

            $terms = TCS::find($id);
            $terms->class_id=$request->class;
            $terms->conditions=$desc;
            $terms->save();

            return redirect('School/Management/System/terms/conditons/index')->with('success','terms and condition successfully added');

    }
}

