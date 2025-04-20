<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Region;



class SubRegion extends Model
{
    use HasFactory;
    protected $table='subregions';
    protected $fillable=['region_id','name'];

    public function region(){
        return $this->belongsTo(Region::class);
    }
}

