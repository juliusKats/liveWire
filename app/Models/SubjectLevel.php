<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Subjects;
class SubjectLevel extends Model
{
    use HasFactory;
    //
   protected $fillable =[
        'code','subject_id','level_id','isComp','isPrinciple','Categoty'
    ];

    public function level(){
        return $this->belongsTo(Levels::class);
    }
    public function Subjects(){
        return $this->belongsTo(Subjects::class);
    }
}


