<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\OrderHistory
 *
 * @property int $id
 * @property string $order_id
 * @property string $region_id
 * @property string $location_id
 * @property string $type_id
 * @property int $is_buy_order
 * @property string $price
 * @property string $escrow
 * @property string $volume_min
 * @property string $volume_total
 * @property string $volume_remain
 * @property string $state
 * @property string $issued_by
 * @property string $wallet_division
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\WalletDivision $division
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereEscrow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereIsBuyOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereIssuedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereVolumeMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereVolumeRemain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereVolumeTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereWalletDivision($value)
 * @mixin \Eloquent
 */
class OrderHistory extends Model
{
    protected $table = 'order_history';

    public function division()
    {
        return $this->belongsTo(WalletDivision::class, 'wallet_division', 'division_id');
    }
}
