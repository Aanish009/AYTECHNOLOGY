<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstructorProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'designation', 'department',
        'bio', 'qualification', 'experience_years', 'specialization',
        'state', 'country', 'profile_photo', 'linkedin_url', 'status',
        'rating', 'total_students', 'total_courses',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'decimal:2',
            'experience_years' => 'integer',
            'total_students' => 'integer',
            'total_courses' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
