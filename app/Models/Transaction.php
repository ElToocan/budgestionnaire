<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }


    protected $fillable = [
        'value',
        'reason',
        'budget_id',
    ];

}
