<?php

namespace Mesa;

use Illuminate\Database\Eloquent\{Model, Builder};
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $table = "regions";

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('default_sort', function (Builder $qb) {
            $qb->orderBy('name', 'asc');
        });
    }

    public function constellations(): HasMany
    {
        return $this->hasMany(Constellation::class);
    }
}
