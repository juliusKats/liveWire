<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;
use Illuminate\Database\Eloquent\Model;
class TeamInvitation extends JetstreamTeamInvitation
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_id',
        'email',
        'role',
    ];

    /**
     * Get the team that the invitation belongs to.
     */
    public function teams(): BelongsTo
    {
        return $this->belongsTo(Jetstream::teamModel());
    }

    public function Team(){
        return $this->belongsTo(Team::class);
    }
}
