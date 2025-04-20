<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\YearTerms;
use App\Models\Year;
class Terms extends Model
{
    use HasFactory;
    // use YearTerms;
    // use Year;
   protected $fillable =[
        'term'
    ];

    public function Years(){
        return $this->hasMany(YearTerms::class);
    }
    public function Academic(){
        return $this->hasMany(AcademicYear::class);
    }
}
