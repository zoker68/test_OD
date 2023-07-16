<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ComfortCategory extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function position(): HasOne
    {
        return $this->hasOne(Position::class);
    }

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
