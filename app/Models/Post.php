<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'link',
        'topic_id'
    ];
    protected $attributes = [
        'link' => null
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

}
