<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * Mesa\Constellation
 *
 * @property int $id
 * @property int $region_id
 * @property int $constellation_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Region $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\System[] $systems
 * @property-read int|null $systems_count
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereConstellationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Constellation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Constellation extends Model
{
    /** @var string $table */
    protected $table = "constellations";

    /**
     * Regions relation.
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Systems relation.
     *
     * @return HasMany
     */
    public function systems(): HasMany
    {
        return $this->hasMany(System::class);
    }
}
