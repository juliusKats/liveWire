<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrimaryDetails extends Model
{
    //
    protected $fillable=[
        'student_id','SchName','StdIndex','PLEYear',
        'Eng','Maths','SST','Scie','Aggs','DIV'
    ];
    public function  student(){
        return  $this->belongsTo(Students::class);

     }
}
