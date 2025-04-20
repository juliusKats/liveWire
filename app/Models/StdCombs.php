<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StdCombs extends Model
{
    use HasFactory;
    protected $fillable=['student_id','combination_id','class_id','stream_id'];

    public function students(){
        return $this->belongsTo(Students::class);
    }
    public function combinations(){
        return $this->belongsTo(AlevelCombs::class);
    }
    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function streams(){
        return $this->belongsTo(Streams::class);
    }
}





