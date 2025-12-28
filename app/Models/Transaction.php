<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Transaction extends Model
{
    use HasFactory;

    /**
     * @var \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    protected $fillable = [
        'value',
        'reason',
        'budget_id',
        'account_id',
    ];

    public static function getValueTransactionsAdded(): ?float
    {
        return Transaction::where('account_id',auth()->user()->account->id)
            ->where('value','>',0 )
            ->sum('value');
    }

    public static function getValueTransactionsDeducted(): ?float
    {
        return Transaction::where('account_id',auth()->user()->account->id)
            ->where('value','<', 0 )
            ->sum('value');
    }

    public static function getLastTransaction() : ?Transaction
    {
        return Transaction::where('account_id', auth()->user()->account->id )
            ->latest()
            ->first();
    }

    public static function getTransactionByAccount(Account $account): Collection
    {
        return $account->transactions;
    }

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

}
