<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Systems extends Model
{
    public function constellation(): BelongsTo
    {
        return $this->belongsTo(Constellations::class);
    }

    public function stargates(): HasMany
    {
        return $this->hasMany(Stargates::class);
    }

    public function stations(): hasMany
    {
        return $this->hasMany(Stations::class);
    }
}
