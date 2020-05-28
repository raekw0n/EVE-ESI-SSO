<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Mesa\Stargates
 *
 * @property int $id
 * @property int $system_id
 * @property int $stargate_id
 * @property string $name
 * @property int $destination_stargate_id
 * @property int $destination_system_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Systems $system
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereDestinationStargateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereDestinationSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereStargateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stargates whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stargates extends Model
{
    public function system(): BelongsTo
    {
        return $this->belongsTo(Systems::class);
    }
}
