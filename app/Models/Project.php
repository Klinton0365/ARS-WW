<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'client_name',
        'location',
        'cover_image',
        'summary',
        'description',
        'gallery',
        'is_featured',
        'is_published',
        'completed_at',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'completed_at' => 'date',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->latest('completed_at');
    }
}
