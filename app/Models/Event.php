<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'time',
        'title',
        'description',
        'color',
        'all_day',
        'start_at',     // ← must be fillable too
    ];

    protected $casts = [
        'date'     => 'date:Y-m-d',
        'time'     => 'datetime:H:i',
        'all_day'  => 'boolean',
        'start_at' => 'datetime',    // ← so ->toDateString() works
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
