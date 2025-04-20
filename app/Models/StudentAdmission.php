<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    //
   protected $fillable=['student_id','level_id','section_id','year_id','term_id','class_id','stream_id'];
}
