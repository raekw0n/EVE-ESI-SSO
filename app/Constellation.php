<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Constellation extends Model
{
    protected $table = "constellations";

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function systems(): HasMany
    {
        return $this->hasMany(System::class);
    }
}
