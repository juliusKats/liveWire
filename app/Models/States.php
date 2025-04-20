<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{

    protected $fillable=['name','country_id','country_code',
'fip_code','iso2','type','level','parent_id','latitude','longitude','flag','wikiDataId','status'
];
}
