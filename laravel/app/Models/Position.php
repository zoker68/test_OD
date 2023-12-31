<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function comfortCategories(): BelongsToMany
    {
        return $this->belongsToMany(ComfortCategory::class, 'position_comfort_categories');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
