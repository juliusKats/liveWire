<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupInvite extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'group_id',
        'email',
        'role',
    ];
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
