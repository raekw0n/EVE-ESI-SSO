<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Station extends Model
{
    protected $table = "stations";

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
