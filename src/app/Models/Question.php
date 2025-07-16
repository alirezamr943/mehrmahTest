<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'topic_id',
        'question'
    ];

    public function questions(): BelongsTo
    {
        return $this->belongsTo(Topic::class, "topic_id");
    }
}
