<?php

namespace Mesa;

use Illuminate\Database\Eloquent\{Model, Builder};
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Mesa\Region
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Constellation[] $constellations
 * @property-read int|null $constellations_count
 * @method static Builder|Region newModelQuery()
 * @method static Builder|Region newQuery()
 * @method static Builder|Region query()
 * @method static Builder|Region whereCreatedAt($value)
 * @method static Builder|Region whereDescription($value)
 * @method static Builder|Region whereId($value)
 * @method static Builder|Region whereName($value)
 * @method static Builder|Region whereRegionId($value)
 * @method static Builder|Region whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Region extends Model
{
    /** @var string $table */
    protected $table = "regions";

    /**
     * Bootstrap the model.
     *
     * @return void;
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('default_sort', function (Builder $qb) {
            $qb->orderBy('name', 'asc');
        });
    }

    /**
     * Constellations relation.
     *
     * @return HasMany
     */
    public function constellations(): HasMany
    {
        return $this->hasMany(Constellation::class);
    }
}
