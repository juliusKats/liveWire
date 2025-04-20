<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StdEmmergency extends Model
{
    protected $fillable=['student_id','emAddress','relation_id','emmName','emmTelephone','emmMobile','emmPhoto','emmMail','emmType_id'];
}
