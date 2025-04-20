<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Students extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name','email','gender','telephone','dob','bothparents','livingwith','admitted','admittedOn','stdPhoto',
    'level_id','section_id','year_id','class_id','stream_id','religion_id','term_id','condition','official_comments'
    ];
    public function levels(){
        return $this->belongsTo(Levels::class);
    }
    public function sections(){
        return $this->belongsTo(Sections::class);
    }
    public function years(){
        return $this->belongsTo(Year::class);
    }
    public function classes(){
        return $this->belongsTo(Classes::class);
    }
    public function streams(){
        return $this->belongsTo(Streams::class);
    }
    public function terms(){
        return $this->belongsTo(Terms::class);
    }
   

    public function stdclass(){
        return $this->hasMany(StudentClass::class);
    }
    public function stdSubjects(){
        return $this->hasMany(StudentSubject::class);
    }
    public function stdHouse(){
        return $this-> hasMany(StudentHouse::class);
    }
    public function stdActivity(){
        return $this-> hasMany(StudentActivity::class);
    }
    public function stdFather(){
        return $this-> hasMany(Father::class);
    }
    public function stdMother(){
        return $this->hasMany(Mother::class);
    }
    public function stdGuardian(){
        return $this->hasMany(Guardian::class);
    }


}
