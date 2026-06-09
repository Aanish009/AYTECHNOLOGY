<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'category_id', 'instructor_id', 'short_description',
        'description', 'thumbnail', 'preview_video', 'duration', 'level',
        'plan_type', 'price', 'discount_price', 'status', 'approval_status',
        'approved_by', 'approved_at', 'admin_feedback', 'language',
        'certificate_template', 'has_certificate', 'total_lectures',
        'total_duration_minutes', 'total_enrollments', 'average_rating',
        'total_reviews', 'requirements', 'what_you_learn', 'tags', 'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',
            'average_rating' => 'decimal:2',
            'approved_at' => 'datetime',
            'has_certificate' => 'boolean',
            'is_featured' => 'boolean',
            'requirements' => 'array',
            'what_you_learn' => 'array',
            'tags' => 'array',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function modules(): HasMany
    {
        return $this->hasMany(CourseModule::class)->orderBy('position');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(CourseReview::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
