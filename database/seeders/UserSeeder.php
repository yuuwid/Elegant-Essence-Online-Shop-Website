<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
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
            User::create([
                'full_name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => bcrypt('123456'),
                'address' => $faker->address(),
                'phone_number' => $faker->phoneNumber(),
                'profile_photo' => 'images/root/no-profile.png'
            ]);
        }
    }
}
