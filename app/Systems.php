<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Mesa\Systems
 *
 * @property int $id
 * @property int $constellation_id
 * @property int $system_id
 * @property string $name
 * @property string|null $security_class
 * @property string $security_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Constellations $constellation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Stargates[] $stargates
 * @property-read int|null $stargates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Stations[] $stations
 * @property-read int|null $stations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereConstellationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereSecurityClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereSecurityStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Systems whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Systems extends Model
{
    public function constellation(): BelongsTo
    {
        return $this->belongsTo(Constellations::class);
    }

    public function stargates(): HasMany
    {
        return $this->hasMany(Stargates::class);
    }

    public function stations(): hasMany
    {
        return $this->hasMany(Stations::class);
    }
}
