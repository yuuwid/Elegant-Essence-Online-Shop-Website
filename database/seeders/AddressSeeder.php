<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AddressSeeder extends Seeder
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
            $n_address = random_int(1, 3);
            $active_address = random_int(1, 3);

            for ($j = 1; $j <= $n_address; $j++) {
                Address::create([
                    'id_user' => $i,
                    'street_name' => $faker->streetAddress(),
                    'subdistrict' => $faker->streetName(),
                    'zip_code' => $faker->postcode(),
                    'city' => $faker->city(),
                    'province' => $faker->state(),
                    'status' => $j == $active_address ? 1 : 0,
                ]);
            }
        }
    }
}
