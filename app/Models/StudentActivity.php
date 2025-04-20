<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentActivity extends Model
{
    use HasFactory;
    //
    protected $fillable=['student_id','activity_id'];

   public function  students(){
     return $this->belongsTo(Students::class);
   }
   public function activity(){
    return $this->belongsTo(Activities::class);
   }
}

