<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StdAddress extends Model
{
    use HasFactory;
    protected $fillable=['student_id','country_id','nationality_id',
    'district','city','province','county','subcounty','parish','address'];
}
