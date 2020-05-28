<?php

namespace Mesa;

use Illuminate\Database\Eloquent\{Model, Builder};
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Mesa\Regions
 *
 * @property int $id
 * @property int $region_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\Constellations[] $constellations
 * @property-read int|null $constellations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Regions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Regions extends Model
{

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('default_sort', function (Builder $qb) {
            $qb->orderBy('name', 'asc');
        });
    }

    public function constellations(): HasMany
    {
        return $this->hasMany(Constellations::class);
    }
}
