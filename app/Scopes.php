<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\Scopes
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property string|null $access
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereAccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scopes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Scopes extends Model
{
    //
}
