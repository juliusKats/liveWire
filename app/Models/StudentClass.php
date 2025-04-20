<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentClass extends Model
{
    use HasFactory;
    //
   protected $fillable=['student_id','class_id','stream_id','year_id'];

   public function students(){
     return $this->belongsTo(Students::class);
   }
   public function  classes(){
    return $this->belongsTo(Classes::class);
}
public  function streams(){
    return $this->belongsTo(Streams::class);
}
public  function years(){
    return $this->belongsTo(Year::class);
}

}

