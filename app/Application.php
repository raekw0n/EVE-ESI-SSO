<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\Application
 *
 * @property int $id
 * @property string $character_name
 * @property string $character_corporation
 * @property mixed $character_raw_data
 * @property string $length_playing
 * @property string $favourite_activities
 * @property string $reason_joining
 * @property string|null $real_life
 * @property string|null $haiku
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCharacterCorporation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCharacterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCharacterRawData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereFavouriteActivities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereHaiku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereLengthPlaying($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereRealLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereReasonJoining($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Application extends Model
{
    /** @var string $table */
    protected $table = "applications";
}
