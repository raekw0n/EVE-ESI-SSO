<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Constellations extends Model
{
    public function region(): BelongsTo
    {
        return $this->belongsTo(Regions::class);
    }

    public function systems(): HasMany
    {
        return $this->hasMany(Systems::class);
    }
}
