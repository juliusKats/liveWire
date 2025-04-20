<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Terms;
use App\Models\Year;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'year_id','term_id'
    ];

    public function years(){
        return $this->belongsTo(Year::class);
    }
    public function terms(){
        return $this->belongsTo(Terms::class);
    }
}
