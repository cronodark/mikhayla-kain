<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $transactionIds = Transaction::pluck('id')->toArray();
        for ($i = 0; $i < 150; $i++) {
            $createdAt = Carbon::today()->toDateString();
            $updatedAt = Carbon::today()->toDateString();

            DetailTransaction::insert([
                'weight' => $faker->randomFloat(2, 25, 30),
                'id_transaction' => $faker->randomElement($transactionIds),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ]);
        }
    }
}
