<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UCEDetails extends Model
{
    protected $fillable =[
        'student_id','SchName','StdIndex','UCEYear','subj','subjGrades','Aggs','DIV'
    ];
    public function  student(){
        return  $this->belongsTo(Students::class);

     }
}
