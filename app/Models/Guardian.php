<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guardian extends Model
{
    use HasFactory;
    //
    protected $fillable =['name','email','mobile','telephone',
    'idnumber','district','city','province','county','subcounty','address',
    'parish' ,'student_id','idType_id','nationality_id','avatar','relation_id'
    ];

   public function nationality(){
        return $this->belongsTo(Nationalities::class);
    }
    public function identity(){
        return $this->belongsTo(Identities::class);
    }
    public function  student(){
       return  $this->belongsTo(Students::class);

    }
    public function  relation(){
        return  $this->belongsTo(Relationship::class);

     }
}
