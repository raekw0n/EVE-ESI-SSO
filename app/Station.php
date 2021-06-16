<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Mesa\Station
 *
 * @property int $id
 * @property int $system_id
 * @property int $station_id
 * @property string $name
 * @property int $max_dock_ship_volume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\System $system
 * @method static \Illuminate\Database\Eloquent\Builder|Station newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Station query()
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereMaxDockShipVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Station whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Station extends Model
{
    /** @var string $table */
    protected $table = "stations";

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
