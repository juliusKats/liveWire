<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSubjects extends Model
{
    use HasFactory;

    protected $fillable=['class_id','subject_id'];

    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function subject(){
        return $this->belongsTo(Subjects::class);
    }

}

