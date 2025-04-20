<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;
    //
   protected $fillable =[
        'year'
    ];

    public function Terms(){
        return $this->hasMany(YearTerms::class);
    }
    public function Academic(){
        return $this->hasMany(AcademicYear::class);
    }
    public function Studentlass(){
        return $this->hasMany(StudentClass::class);
    }
    // public function yrTerms(){
    //     return $this->hasMany(StudentClass::class);
    // }

}
