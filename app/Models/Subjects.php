<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SubjectLevel;
class Subjects extends Model
{
    use HasFactory;
    //
   protected $fillable =[
        'code','name'
    ];

    public function levels(){
        return $this->hasMany(Level::class);
    }
    public function stdSubjects(){
        return $this->hasMany(StudentSubject::class);
    }
    public function classSubjects(){
        return $this->hasMany(ClassSubjects::class);
    }
    public function subjects(){
        return $this->hasMany(Subjects::class);
    }
    public function subjLevel(){
        return $this->hasMany(SubjectLevel::class);
    }
}
