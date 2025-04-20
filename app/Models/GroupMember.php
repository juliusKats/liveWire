<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class GroupMember extends Model
{
    //
    use HasFactory;
    protected $fillable = [

        'group_id',
        'user_id',
        'role',

    ];
    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
