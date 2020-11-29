<?php

namespace Mesa;

use Illuminate\Database\Eloquent\Model;

class WalletJournal extends Model
{
    protected $table = 'wallet_journal';

    public function division()
    {
        return $this->belongsTo(WalletDivision::class, 'division_id', 'division_id');
    }

    public function transaction()
    {
        return $this->belongsTo(WalletTransaction::class, 'journal_ref_id', 'journal_id');
    }
}
