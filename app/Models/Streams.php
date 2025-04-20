<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Streams extends Model
{
    //
    protected $fillable=['name','abbrev'];

    public function stdClass(){
        return $this->hasMany(StudentClass::class);
    }

    public function streamlevel(){
        return $this->hasMany(StreamLevel::class);
    }

}

