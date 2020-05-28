<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\Application
 *
 * @property int $id
 * @property string $character_name
 * @property string $character_corporation
 * @property string $length_playing
 * @property string $favourite_activities
 * @property string $reason_joining
 * @property string|null $real_life
 * @property string $haiku
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereCharacterCorporation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereCharacterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereFavouriteActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereHaiku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereLengthPlaying($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereRealLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereReasonJoining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Mesa\Application whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    //
}
