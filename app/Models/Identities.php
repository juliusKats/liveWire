<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identities extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name'];
    public function  fathers(){
        return  $this->hasMany(Father::class);
     }

     public function  mothers(){
        return  $this->hasMany(Father::class);
     }
     public function  guardians(){
        return  $this->hasMany(Father::class);
     }
}
