<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TermsAndConditions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Classes extends Model
{
    use HasFactory,SoftDeletes;
    //
    protected $dates =['deleted_at'];
    protected $fillable=['name','abbrev'];

    public function classStudent(){
        return $this->hasMany(StudentClass::class);
    }
    public function classStream(){
        return $this->hasMany(ClassStream::class);
    }
    public function classSubject(){
        return $this->hasMany(ClassSubject::class);
    }

    public function TandC(){
        return $this->hasMany(TermsAndConditions::class);
    }

}
