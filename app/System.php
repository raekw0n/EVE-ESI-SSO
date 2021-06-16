<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * Mesa\System
 *
 * @property int $id
 * @property int $constellation_id
 * @property int $system_id
 * @property string $name
 * @property string|null $security_class
 * @property string $security_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\Constellation $constellation
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Stargate[] $stargates
 * @property-read int|null $stargates_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Station[] $stations
 * @property-read int|null $stations_count
 * @method static \Illuminate\Database\Eloquent\Builder|System newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System query()
 * @method static \Illuminate\Database\Eloquent\Builder|System whereConstellationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSecurityClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSecurityStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class System extends Model
{
    /** @var string $table */
    protected $table = "systems";

    /**
     * Constellations relation.
     *
     * @return BelongsTo
     */
    public function constellation(): BelongsTo
    {
        return $this->belongsTo(Constellation::class);
    }

    /**
     * Stargates relation.
     *
     * @return HasMany
     */
    public function stargates(): HasMany
    {
        return $this->hasMany(Stargate::class);
    }

    /**
     * Stations relation.
     *
     * @return HasMany
     */
    public function stations(): hasMany
    {
        return $this->hasMany(Station::class);
    }
}
