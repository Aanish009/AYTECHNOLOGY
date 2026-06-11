<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CertificateTemplate extends Model
{
    protected $fillable = ['name', 'template_image', 'fields_config', 'is_default'];

    protected function casts(): array
    {
        return [
            'fields_config' => 'array',
            'is_default' => 'boolean',
        ];
    }
}
