<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\WalletDivision
 *
 * @property int $id
 * @property string $division_id
 * @property string $division_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\WalletJournal[] $journal
 * @property-read int|null $journal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\OrderHistory[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Mesa\WalletTransaction[] $transactions
 * @property-read int|null $transactions_count
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletDivision whereId($value)
 * @mixin \Eloquent
 */
class WalletDivision extends Model
{
    protected $table = 'wallet_divisions';

    public function journal()
    {
        return $this->hasMany(WalletJournal::class, 'division_id', 'division_id');
    }

    public function orders()
    {
        return $this->hasMany(OrderHistory::class, 'wallet_division', 'division_id');
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class, 'division_id', 'division_id');
    }
}
