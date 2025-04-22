<?php

namespace App\Models;
use App\Models\Levels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentScores extends Model
{
    use HasFactory;
    protected $fillable=['level_id','student_id','class_id',
    'year_id','stream_id','term_id','grade_id',
    'examset_id','paper_id','objective_id','subject_id','score'];

    public function leveled(){
        return $this->belongsTo(Levels::class,'level_d','id');
    }

    public function students(){
        return $this->belongsTo(Students::class);
    }
    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function years(){
        return $this->belongsTo(Year::class);
    }
    public function streams(){
        return $this->belongsTo(Streams::class);
    }
    public function terms(){
        return $this->belongsTo(Terms::class);
    }
    public function grades(){
        return $this->belongsTo(Grade::class);
    }
    public function examsets(){
        return $this->belongsTo(ExamSets::class);
    }
    public function papers(){
        return $this->belongsTo(Papers::class);
    }
}

