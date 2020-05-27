<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stargates extends Model
{
    public function system(): BelongsTo
    {
        return $this->belongsTo(Systems::class);
    }
}
