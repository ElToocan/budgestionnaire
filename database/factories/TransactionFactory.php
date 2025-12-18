<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        $value = rand(-50, 50) / 2.4 ;

        return [
            'value' => $value,
            'reason' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'budget_id' => Budget::inRandomOrder()->first(),
            'account_id' => Account::inRandomOrder()->first(),
        ];
    }
}
