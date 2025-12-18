<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Budget;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BudgetFactory extends Factory
{
    protected $model = Budget::class;

    public function definition(): array
    {
        $value = rand(200, 500) / 7.4 ;

        return [
            'maxValue' => $value,
            'remainingValue' => $value,
            'name' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'account_id' => Account::inRandomOrder()->first(),
        ];
    }
}
