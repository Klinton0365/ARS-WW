<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Catalog extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'specifications',
        'image',
        'is_published',
    ];

    protected $casts = [
        'specifications' => 'array',
        'is_published' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->latest();
    }
}
