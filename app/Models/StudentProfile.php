<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProfile extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'gender', 'alt_phone',
        'address_line1', 'address_line2', 'city', 'state', 'zipcode', 'country',
        'education_level', 'is_10th_pass', 't10_school_name', 't10_board',
        't10_year', 't10_percentage', 't10_marksheet', 'is_12th_pass',
        't12_stream', 't12_board', 't12_school_name', 't12_year',
        't12_percentage', 't12_marksheet', 'is_undergraduate',
        'ug_course_name', 'profile_photo',
    ];

    protected function casts(): array
    {
        return [
            'is_10th_pass' => 'boolean',
            'is_12th_pass' => 'boolean',
            'is_undergraduate' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
