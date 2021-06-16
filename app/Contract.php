<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

/**
 * Mesa\Contract
 *
 * @property int $id
 * @property string $esi_contract_id
 * @property string $volume
 * @property string $type
 * @property string $availability
 * @property int|null $days_to_complete
 * @property int $issuer_id
 * @property int $reward
 * @property int $collateral
 * @property int $start_location_id
 * @property int $end_location_id
 * @property string|null $date_expires
 * @property string|null $date_issued
 * @property string|null $date_accepted
 * @property string|null $date_completed
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereCollateral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDateAccepted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDateCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDateExpires($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDateIssued($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereDaysToComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereEndLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereEsiContractId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereIssuerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereStartLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contract whereVolume($value)
 * @mixin \Eloquent
 */
class Contract extends Model
{
    /** @var string $table */
    protected $table = "contracts";

    /** @var bool $timestamps */
    public $timestamps = false;
}
