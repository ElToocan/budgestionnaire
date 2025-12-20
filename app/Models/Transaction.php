<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'reason',
        'budget_id',
        'description',
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

    public static function getLastTransaction() : Transaction
    {
        return Transaction::all()
            ->where('account_id', auth()->user()->account->id )
            ->first();
    }

    public static function getTransactionByAccount(Account $account): Collection
    {
        $returnedTransaction = [];
        foreach ($account->budgets as $budget)
        {
            foreach ($budget->transactions as $transaction)
            {
                $returnedTransaction[] = $transaction;
            }
        }
        return collect($returnedTransaction)->sortByDesc('created_at') ;
    }

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }
}
