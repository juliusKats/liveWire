<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\StreamLevel;
use App\Models\SubjectLevels;
use App\Models\Students;
use App\Models\StudentScores;

class Levels extends Model
{
    use HasFactory;
    //
    protected $fillable=['name','abbrev'];
    public function level(){
        return $this->hasMany(SubjectLevels::class);
    }
    public function students(){
        return $this->hasMany(Students::class);
    }
    public function streamlevel(){
        return $this->hasMany(StreamLevel::class);
    }

    public function stdscores(){
        return $this->hasMany(StudentScores::class,'level_id','id');
    }
    

}


