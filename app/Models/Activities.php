<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    //
    protected $fillable=['name'];

    public function stdActivity(){
        return $this->hasMany(StudentActivity::class);
    }

}
