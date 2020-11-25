<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Contract extends Model
{
    protected $table = "contracts";

    public $timestamps = false;
}
