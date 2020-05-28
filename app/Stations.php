<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Mesa\Stations
 *
 * @property int $id
 * @property int $system_id
 * @property int $station_id
 * @property string $name
 * @property float $max_dock_ship_volume
 * @property float|null $reprocessing_station_efficiency
 * @property float|null $reprocessing_station_tax
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Systems $system
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereMaxDockShipVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereReprocessingStationEfficiency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereReprocessingStationTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereStationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Stations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Stations extends Model
{
    public function system(): BelongsTo
    {
        return $this->belongsTo(Systems::class);
    }
}
