<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'quiz_id', 'question', 'type', 'options',
        'correct_answers', 'explanation', 'marks', 'position', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
            'correct_answers' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
