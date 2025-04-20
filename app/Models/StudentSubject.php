<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentSubject extends Model
{
    use HasFactory;

    //
    protected $fillable=['student_id','subject_id'];
    public function students(){
        return $this->belongsTo(Students::class);
    }
    public function subjects(){
        return $this->belongsTo(Subjects::class);
    }
}
