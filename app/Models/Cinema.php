<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'email',
        'facilities',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function theaters(): HasMany
    {
        return $this->hasMany(Theater::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
} 