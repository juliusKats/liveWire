<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSetScores extends Model
{
    protected $fillable =['term_id','year_id','exam_id'];
}
