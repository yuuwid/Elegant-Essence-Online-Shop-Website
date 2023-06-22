<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use Illuminate\Support\Str;

class ProductSeeder extends Seeder
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
            $p_name = $faker->sentence(random_int(6, 12));

            Product::create([
                'product_name' => $p_name,
                'slug_product' => Str::slug($p_name),
                'description' => $faker->sentences(random_int(1, 5), true),
                'id_brand' => random_int(1, 4),
                'id_category' => random_int(1, 3),
            ]);
        }
    }
}
