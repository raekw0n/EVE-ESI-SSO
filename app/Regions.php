<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Regions extends Model
{
    public function constellations(): HasMany
    {
        return $this->hasMany(Constellations::class);
    }
}
