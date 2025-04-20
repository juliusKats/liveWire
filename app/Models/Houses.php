<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Houses extends Model
{
    //
    use HasFactory;
    protected $fillable=['name'];

    public function stdHouse(){
        return $this->hasMany(StudentHouse::class);
    }
}
