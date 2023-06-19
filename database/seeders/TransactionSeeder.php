<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Delivery;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $id_user = $i;
            $id_address = Address::where('id_user', $id_user)
                ->get('id_address')->first()['id_address'];
            $id_delivery = Delivery::where('id_address', $id_address);

            if ($id_delivery->count() > 0) {
                $id_delivery = $id_delivery->get('id_delivery');

                foreach ($id_delivery as $id_d) {
                    $date = $faker->dateTimeBetween('-3 months', '-1 days');
                    Transaction::create([
                        'id_user' => $id_user,
                        'id_delivery' => $id_d['id_delivery'],
                        'id_payment' => random_int(1, 3),
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }
            }
        }
    }
}
