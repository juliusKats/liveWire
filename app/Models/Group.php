<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'user_id',
        'name',
        'personal_group',
    ];
    protected function casts(): array
    {
        return [
            'personal_team' => 'boolean',
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function invitation(){
        return $this->hasMany(GroupInvite::class);
    }
    public function membership(){
        return $this->hasMany(GroupMember::class);
    }
}
