<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SubjectPapers extends Model
{
    use HasFactory;
    //
    protected $fillable=['subject_id','level_id'];

    /**
     * Get the subject that owns the SubjectPapers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(SubjectLevel::class);
    }
    public function level(): BelongsTo
    {
        return $this->belongsTo(tLevel::class);
    }
}
