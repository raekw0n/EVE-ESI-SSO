<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class System extends Model
{
    protected $table = "systems";

    public function constellation(): BelongsTo
    {
        return $this->belongsTo(Constellation::class);
    }

    public function stargates(): HasMany
    {
        return $this->hasMany(Stargate::class);
    }

    public function stations(): hasMany
    {
        return $this->hasMany(Station::class);
    }
}
