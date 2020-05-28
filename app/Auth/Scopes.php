<?php

namespace Mesa\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\Auth\Scopes
 *
 * @property int $id
 * @property string $name
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Auth\Scopes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Scopes extends Model
{}
