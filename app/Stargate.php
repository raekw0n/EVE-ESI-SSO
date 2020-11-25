<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stargate extends Model
{
    protected $table = "stargates";

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
