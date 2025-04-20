<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentHouse extends Model
{
    //
    use HasFactory;
    protected $fillable=['student_id','house_id'];

    public function students(){
    return $this->belongsTo(Students::class);
    }
    public function houses(){
    return $this->belongsTo(Houses::class);
    }
}
