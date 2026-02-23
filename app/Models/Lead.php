<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'service_type',
        'message',
        'source',
        'status',
        'admin_notes',
    ];

    public function scopeNewest(Builder $query): Builder
    {
        return $query->latest();
    }
}
