<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

/**
 * Mesa\WalletTransaction
 *
 * @property int $id
 * @property string $division_id
 * @property string $transaction_id
 * @property string $type_id
 * @property string $client_id
 * @property int $is_buy
 * @property string $journal_ref_id
 * @property string $location_id
 * @property int $quantity
 * @property int $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Mesa\WalletDivision $division
 * @property-read \Mesa\WalletJournal|null $journal
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereIsBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereJournalRefId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WalletTransaction extends Model
{
    protected $table = 'wallet_transactions';

    public function division()
    {
        return $this->belongsTo(WalletDivision::class, 'division_id', 'division_id');
    }

    public function journal()
    {
        return $this->hasOne(WalletJournal::class, 'journal_id', 'journal_ref_id');
    }
}
