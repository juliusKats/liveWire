<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Relationship extends Model
{
    use HasFactory;
    //
    protected $fillable=['name'];
    public function  guardian(){
        return  $this->hasMany(Guardian::class);

     }
}
