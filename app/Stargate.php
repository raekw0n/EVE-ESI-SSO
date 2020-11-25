<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stargate extends Model
{
    /** @var string $table */
    protected $table = "stargates";

    /**
     * Systems relation.
     *
     * @return BelongsTo
     */
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }
}
