<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;

class Membership extends JetstreamMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected $fillable = [

        'team_id',
        'user_id',
        'role',

    ];
    public function Team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
