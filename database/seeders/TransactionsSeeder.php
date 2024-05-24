<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Transaction;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $customerIds = Customer::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $createdAt = Carbon::today()->toDateString();
            $updatedAt = Carbon::today()->toDateString();

            Transaction::insert([
                'date' => $createdAt,
                'id_customer' => $faker->randomElement($customerIds),
                'product_name' => $faker->randomElement(['Scuba', 'Spandex']),
                'color' => $faker->randomElement(['Putih', 'Hitam', 'Abu']),
                'quantity' => $faker->numberBetween(10,2000),
                'gramasi' => $faker->numberBetween(50,70),
                'status' => $faker->numberBetween(1,3),
                'nopol' => $this->generateRandomLicensePlate($faker),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt
            ]);
        }
    }

    private function generateRandomLicensePlate($faker)
    {
        $letters = strtoupper($faker->lexify('??'));
        $numbers = $faker->numerify('###');
        $suffix = strtoupper($faker->lexify('??'));

        return $letters . ' ' . $numbers . ' ' . $suffix;
    }
}
