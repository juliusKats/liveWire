<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Classes;
class TermsAndConditions extends Model
{
    use HasFactory;
    // protected $table = classes;

    protected $fillable=['class_id','conditions'];

    public function classt(){
        return $this->belongsTo(Classes::class);
    }
}
