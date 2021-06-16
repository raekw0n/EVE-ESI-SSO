<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Mesa\Stargate
 *
 * @property int $id
 * @property int $system_id
 * @property int $stargate_id
 * @property string $name
 * @property int $destination_stargate_id
 * @property int $destination_system_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\System $system
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereDestinationStargateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereDestinationSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereStargateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stargate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
