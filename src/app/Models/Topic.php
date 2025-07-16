<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Topic extends Model
{
    protected $table = 'topics';
    protected $fillable = [
        'title',
        'parent_node_id'
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, "topic_id");
    }

    public function children(): HasMany
    {
        return $this->hasMany(Topic::class, "parent_node_id", "id");
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Topic::class, "parent_node_id", "id");
    }


}
