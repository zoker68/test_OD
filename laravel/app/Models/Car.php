<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function comfortCategory(): BelongsTo
    {
        return $this->belongsTo(ComfortCategory::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(CarBooking::class);
    }
}
