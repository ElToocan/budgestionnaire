<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Budget;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Account::factory(1)->create([
            'id' => 1,
            'sold' => 1000,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'account_id' => 1,
        ]);

        Budget::factory(2)->create();

        Transaction::factory(20)->create();

    }
}
