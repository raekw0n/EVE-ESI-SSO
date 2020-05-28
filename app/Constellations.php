<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Mesa\Constellations
 *
 * @property int $id
 * @property int $region_id
 * @property int $constellation_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Regions $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Systems[] $systems
 * @property-read int|null $systems_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereConstellationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Constellations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Constellations extends Model
{
    public function region(): BelongsTo
    {
        return $this->belongsTo(Regions::class);
    }

    public function systems(): HasMany
    {
        return $this->hasMany(Systems::class);
    }
}
