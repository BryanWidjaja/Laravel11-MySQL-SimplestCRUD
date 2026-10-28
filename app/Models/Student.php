<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'program_id',
        'student_number',
        'name',
        'email',
        'score'
    ];

    public function program (): BelongsTo {
        return $this->belongsTo(Program::class);
    }
}