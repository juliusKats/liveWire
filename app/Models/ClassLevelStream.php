<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassLevelStream extends Model
{
    use HasFactory;

    protected $fillable=['level_id','class_id','stream_id'];

    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function stream(){
        return $this->belongsTo(Streams::class);
    }
    public function level(){
        return $this->belongsTo(Levels::class);
    }
}
