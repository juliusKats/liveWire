<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Terms;
use App\Models\Year;

class YearTerms extends Model
{
    use HasFactory;
    //
   protected $fillable =[
        'year_id','term_id'
    ];

    public function yeary(){
        return $this->belongsTo(Year::class);
    }
    public function terms(){
        return $this->belongsTo(Terms::class);
    }

}
