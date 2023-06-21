<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Delivery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $n_address = Address::all()->count();


        for ($i = 1; $i <= 300; $i++) {
            Delivery::create([
                'id_expedition' => random_int(1, 9),
                'recipient_name' => $faker->name(),
                'recipient_phone_number' => $faker->phoneNumber(),
                'id_address' => random_int(1, $n_address),
            ]);
        }
    }
}
