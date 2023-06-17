<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("id_ID");

        for ($i = 0; $i < 10; $i++) {
            $pname = $faker->sentence(random_int(2, 6));

            Product::create([
                'product_name' => $pname,
                'slug_product' => Str::slug($pname),
                'id_brand' => random_int(1, 2),
                'id_category' => 1,
            ]);
        }
    }
}
