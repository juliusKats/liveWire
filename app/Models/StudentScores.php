<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentScores extends Model
{
    //

            protected $fillable=['student_id','class_id','year_id','term_id','subject_id','examset_id','objective_id','paper_id','score'];
}
