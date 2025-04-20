<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\SubRegion;
class Region extends Model
{
use SoftDeletes;
use HasFactory;
    protected $table='regions';
    //
    protected $fillable=['name','translations','flag','wikiDataId','status','restored_at','deleted_by','restored_by'];
    protected  $casts =['deleted_at' =>'date','restored_at'=>'date'];

    public function subregion(){
        return $this->hasMany(SubRegion::class);
    }


}
